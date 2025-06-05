<?php

namespace App\Http\Controllers\Admin\Billing;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class AdminTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::orderBy('transaction_date', 'desc')
            ->with(['client'])
            ->paginate(15);
        return view('admin.pages.billing.transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = User::orderBy('full_name', 'asc')
            ->with('clientDetails')
            ->get();
        return view('admin.pages.billing.transactions.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'transaction_date' => ['required', 'date'],
            'client_id' => ['nullable', 'exists:users,id'],
            'description' => ['nullable', 'string'],
            'transaction_id' => ['nullable', 'string'],
            'invoice_id' => ['nullable', 'integer'],
            'amount_in' => ['required', 'numeric'],
            'amount_out' => ['required', 'numeric'],
            'amount_fees' => ['nullable', 'numeric'],
            'payment_method' => ['nullable', 'string'],
            'add_to_credit_balance' => ['nullable', 'string'],
        ]);

        Transaction::create([
            'transaction_date' => $validated['transaction_date'],
            'client_id' => $validated['client_id'],
            'description' => $validated['description'],
            'transaction_id' => $validated['transaction_id'],
            'invoice_id' => $validated['invoice_id'],
            'amount_in' => $validated['amount_in'],
            'amount_out' => $validated['amount_out'],
            'amount_fees' => $validated['amount_fees'],
            'payment_method' => $validated['payment_method'],
            'add_to_credit_balance' => $validated['add_to_credit_balance'],
        ]);

        return redirect()->route('admin.billing.transactions.index')->with('success', 'Transaction created successfully.');
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
