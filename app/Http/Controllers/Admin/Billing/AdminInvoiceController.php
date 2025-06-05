<?php

namespace App\Http\Controllers\Admin\Billing;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Invoice;
use Illuminate\Http\Request;

class AdminInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::orderBy('invoice_date', 'desc')
            ->with(['client'])
            ->paginate(25);

        return view('admin.pages.billing.invoices.index', compact('invoices'));
    }

    public function draftInvoices(){
        $invoices = Invoice::where('status', 'draft')
            ->orderBy('invoice_date', 'desc')
            ->with(['client'])
            ->paginate(25);

        return view('admin.pages.billing.invoices.draft-invoices', compact('invoices'));
    }

    public function unpaidInvoices(){
        $invoices = Invoice::where('status', 'unpaid')
            ->orderBy('invoice_date', 'desc')
            ->with(['client'])
            ->paginate(25);

        return view('admin.pages.billing.invoices.unpaid-invoices', compact('invoices'));
    }

    public function overdueInvoices(){
        $invoices = Invoice::where('status', 'overdue')
            ->orderBy('invoice_date', 'desc')
            ->with(['client'])
            ->paginate(25);

        return view('admin.pages.billing.invoices.overdue-invoices', compact('invoices'));
    }

    public function cancelledInvoices(){
        $invoices = Invoice::where('status', 'cancelled')
            ->orderBy('invoice_date', 'desc')
            ->with(['client'])
            ->paginate(25);

        return view('admin.pages.billing.invoices.cancelled-invoices', compact('invoices'));
    }
    public function refundedInvoices(){
        $invoices = Invoice::where('status', 'refunded')
            ->orderBy('invoice_date', 'desc')
            ->with(['client'])
            ->paginate(25);

        return view('admin.pages.billing.invoices.refunded-invoices', compact('invoices'));
    }
    public function collectionsInvoices(){
        $invoices = Invoice::where('status', 'collections')
            ->orderBy('invoice_date', 'desc')
            ->with(['client'])
            ->paginate(25);

        return view('admin.pages.billing.invoices.collections-invoices', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::with('clientDetails')
            ->orderBy('full_name', 'asc')
            ->get();

        return view('admin.pages.billing.invoices.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
