<?php

namespace App\Console\Commands;

use App\Models\Client;
use App\Models\Invoice;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class SyncWhmcsData extends Command
{
    protected $signature = 'app:sync-whmcs-data';
    protected $description = 'Sync clients and transactions from WHMCS to the application';

    public function handle()
    {
        $this->info('Starting WHMCS sync...');

        //$this->syncClients();
        //$this->syncInvoices();
        $this->syncTransactions();

        $this->info('WHMCS sync completed.');
    }

    protected function syncClients()
    {
        $this->info('Syncing WHMCS Clients...');

        $limitnum = 100;
        $limitstart = 0;
        $totalResults = null;
        $allClients = [];

        do {
            $response = Http::asForm()->post(config('services.whmcs.url'), [
                'action' => 'GetClients',
                'responsetype' => 'json',
                'identifier' => config('services.whmcs.identifier'),
                'secret' => config('services.whmcs.secret'),
                'limitstart' => $limitstart,
                'limitnum' => $limitnum,
            ]);

            if (!$response->ok()) {
                $this->error('Failed to fetch clients from WHMCS.');
                $this->line('Response: ' . $response->body());
                return;
            }

            $json = $response->json();
            $clients = $json['clients']['client'] ?? [];
            $totalResults = $json['totalresults'] ?? null;

            $allClients = array_merge($allClients, $clients);

            $limitstart += $limitnum;
        } while ($totalResults !== null && count($allClients) < $totalResults);

        foreach ($allClients as $clientData) {
            DB::beginTransaction();
            try {
                $createdAt = $clientData['datecreated'] ?? now();

                $user = User::updateOrCreate(
                    ['email' => $clientData['email']],
                    [
                        'first_name' => $clientData['firstname'] ?? null,
                        'last_name' => $clientData['lastname'] ?? null,
                        'full_name' => trim(($clientData['firstname'] ?? '') . ' ' . ($clientData['lastname'] ?? '')),
                        'password' => bcrypt(Str::random(16)),
                    ]
                );

                if ($user->wasRecentlyCreated && $createdAt) {
                    $user->created_at = $createdAt;
                    $user->save();
                }

                Client::updateOrCreate(
                    ['whmcs_id' => $clientData['id']],
                    [
                        'user_id' => $user->id,
                        'telephone_number' => $clientData['phonenumber'] ?? null,
                        'company_name' => $clientData['companyname'] ?? null,
                        'address_line_one' => $clientData['address1'] ?? null,
                        'address_line_two' => $clientData['address2'] ?? null,
                        'city' => $clientData['city'] ?? null,
                        'postcode' => $clientData['postcode'] ?? null,
                        'country' => $clientData['country'] ?? null,
                        'stack_user' => $clientData['customfields']['customfield'][0]['value'] ?? null,
                        'status' => $clientData['status'] ?? null,
                        'created_at' => $createdAt,
                    ]
                );

                DB::commit();
            } catch (\Throwable $e) {
                DB::rollBack();
                $this->error("Failed to sync client {$clientData['id']}: {$e->getMessage()}");
            }
        }

        $this->info('Client sync complete.');
    }

    protected function syncInvoices()
    {
        $this->info('Syncing WHMCS Invoices...');

        // Fetch all invoices (handle pagination if needed)
        $limitnum = 100;
        $limitstart = 0;
        $allInvoices = [];
        $totalResults = null;

        do {
            $response = Http::asForm()->post(config('services.whmcs.url'), [
                'action' => 'GetInvoices',
                'responsetype' => 'json',
                'identifier' => config('services.whmcs.identifier'),
                'secret' => config('services.whmcs.secret'),
                'limitstart' => $limitstart,
                'limitnum' => $limitnum,
            ]);

            if (!$response->ok()) {
                $this->error('Failed to fetch invoices from WHMCS.');
                $this->line('Response: ' . $response->body());
                return;
            }

            $json = $response->json();
            $invoices = $json['invoices']['invoice'] ?? [];
            $totalResults = $json['totalresults'] ?? null;

            $allInvoices = array_merge($allInvoices, $invoices);
            $limitstart += $limitnum;
        } while ($totalResults !== null && count($allInvoices) < $totalResults);

        $this->info("Found {$totalResults} invoices to process.");

        $processedCount = 0;
        $successCount = 0;
        $errorCount = 0;

        foreach ($allInvoices as $invoiceSummary) {
            try {
                $invoiceId = $invoiceSummary['id'] ?? null;
                if (!$invoiceId) {
                    $this->warn('Skipping invoice: missing ID in summary.');
                    continue;
                }

                // Debug the summary data
                $this->info("\nProcessing invoice {$invoiceId}");
                $this->line("Summary data: " . json_encode($invoiceSummary, JSON_PRETTY_PRINT));

                // Fetch full invoice with line items
                $invoiceResponse = Http::asForm()->post(config('services.whmcs.url'), [
                    'action' => 'GetInvoice',
                    'responsetype' => 'json',
                    'identifier' => config('services.whmcs.identifier'),
                    'secret' => config('services.whmcs.secret'),
                    'invoiceid' => $invoiceId,
                ]);

                if (!$invoiceResponse->ok()) {
                    $this->warn("Failed to fetch full invoice {$invoiceId}, skipping.");
                    continue;
                }

                $json = $invoiceResponse->json();

                if ($json['result'] !== 'success') {
                    $this->error("WHMCS API returned error for invoice {$invoiceId}");
                    continue;
                }

                // The invoice data is directly in the root of the response
                $invoice = $json;

                // Debug the invoice data we found
                $this->line("\nFound invoice data:");
                $this->line(json_encode($invoice, JSON_PRETTY_PRINT));

                // Get the user ID directly from the response
                $whmcsUserId = $invoice['userid'] ?? null;

                if (!$whmcsUserId) {
                    $this->warn("Invoice {$invoiceId} has no WHMCS user ID. Available fields: " . implode(', ', array_keys($invoice)));
                    continue;
                }

                // Debug client lookup
                $this->info("Looking for client with WHMCS ID: {$whmcsUserId}");
                $client = Client::where('whmcs_id', $whmcsUserId)->first();

                if (!$client) {
                    $this->warn("No matching client found for WHMCS ID {$whmcsUserId}");
                    $this->line("Available clients in database:");
                    $allClients = Client::select('id', 'whmcs_id')->get();
                    foreach ($allClients as $c) {
                        $this->line("Client ID: {$c->id}, WHMCS ID: {$c->whmcs_id}");
                    }
                    continue;
                }

                $this->info("Found matching client: ID {$client->id}, WHMCS ID {$client->whmcs_id}");

                // Map WHMCS status to our status
                $status = match($invoice['status']) {
                    'Draft' => 'draft',
                    'Unpaid' => 'unpaid',
                    'Paid' => 'paid',
                    'Cancelled' => 'cancelled',
                    'Refunded' => 'refunded',
                    'Collections' => 'overdue',
                    'Payment Pending' => 'payment pending',
                    'Overdue' => 'overdue',
                    'Sent' => 'sent',
                    default => 'unpaid'
                };

                DB::beginTransaction();

                // Save or update invoice
                $localInvoice = Invoice::updateOrCreate(
                    ['whmcs_id' => $invoiceId],
                    [
                        'client_id' => $client->id,
                        'whmcs_id' => $invoiceId,
                        'invoice_number' => $invoice['invoicenum'] ?: "{$invoiceId}",
                        'invoice_date' => $invoice['date'] ?? now(),
                        'due_date' => $invoice['duedate'] ?? null,
                        'date_paid' => $status === 'paid' ? ($invoice['datepaid'] ?? now()) : null,
                        'payment_method' => $invoice['paymentmethod'] ?? 'unknown',
                        'status' => $status,
                        'discount' => $invoice['discount'] ?? 0,
                        'discount_type' => 'percentage',
                        'tax_amount' => $invoice['tax'] ?? 0,
                        'sub_total_amount' => $invoice['subtotal'] ?? 0,
                        'total_amount' => $invoice['total'] ?? 0,
                        'notes' => $invoice['notes'] ?? null,
                        'transaction_id' => null,
                        'pdf_path' => null,
                    ]
                );

                // Remove existing items before syncing new ones
                $localInvoice->invoiceItems()->delete();

                $lineItems = $invoice['items']['item'] ?? [];
                if (!empty($lineItems) && is_array($lineItems)) {
                    foreach ($lineItems as $item) {
                        $localInvoice->invoiceItems()->create([
                            'description' => $item['description'] ?? '',
                            'quantity' => $item['qty'] ?? 1,
                            'unit_price' => $item['amount'] ?? 0,
                        ]);
                    }
                }

                DB::commit();
                $successCount++;
                $this->info("Invoice {$invoiceId} synced successfully.");

            } catch (\Throwable $e) {
                DB::rollBack();
                $errorCount++;
                $invoiceId = $invoiceSummary['id'] ?? 'unknown';
                $this->error("Failed to sync invoice {$invoiceId}: {$e->getMessage()}");
                $this->error($e->getTraceAsString());
            }

            $processedCount++;

            // Commit every 50 invoices
            if ($processedCount % 50 === 0) {
                $this->info("\nProgress Update:");
                $this->info("Processed: {$processedCount} invoices");
                $this->info("Successful: {$successCount} invoices");
                $this->info("Failed: {$errorCount} invoices");
                $this->info("----------------------------------------");
            }
        }

        $this->info("\nSync Complete:");
        $this->info("Total Processed: {$processedCount} invoices");
        $this->info("Total Successful: {$successCount} invoices");
        $this->info("Total Failed: {$errorCount} invoices");
    }

    protected function syncTransactions()
    {
        $this->info('Syncing WHMCS Transactions...');

        $response = Http::asForm()->post(config('services.whmcs.url'), [
            'action' => 'GetTransactions',
            'responsetype' => 'json',
            'identifier' => config('services.whmcs.identifier'),
            'secret' => config('services.whmcs.secret'),
        ]);

        if (!$response->ok()) {
            $this->error('Failed to fetch transactions from WHMCS.');
            $this->line('Response: ' . $response->body());
            return;
        }

        $transactions = $response->json()['transactions']['transaction'] ?? [];

        foreach ($transactions as $tx) {
            try {
                $client = null;
                if (!empty($tx['userid'])) {
                    $client = Client::where('whmcs_id', $tx['userid'])->first();
                }
                if (!$client) {
                    $this->warn("No matching client for WHMCS user ID {$tx['userid']} on transaction {$tx['id']}, storing transaction without client link.");
                }

                Transaction::updateOrCreate(
                    ['whmcs_id' => $tx['id']],
                    [
                        'client_id' => optional($client)->id, // Will be null if no client found
                        'amount_in' => $tx['amountin'] ?? null,
                        'amount_out' => $tx['amountout'] ?? null,
                        'amount_fees' => $tx['fees'] ?? null,
                        'payment_method' => $tx['gateway'] ?? null,
                        'description' => $tx['description'] ?? null,
                        'transaction_date' => $tx['date'] ?? now(),
                    ]
                );
            } catch (\Throwable $e) {
                $this->error("Failed to sync transaction {$tx['id']}: {$e->getMessage()}");
            }
        }

        $this->info('Transaction sync complete.');
    }




}
