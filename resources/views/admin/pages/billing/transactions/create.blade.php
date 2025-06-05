@extends('layouts.admin')
@push('page-title')
    Create Transaction
@endpush
@section('content')
    <x-dashboard.hero-banner
        title="Create Transaction"
        displayButton="yes"
        buttonContent="All Transactions"
        buttonLink="{{ route('admin.billing.transactions.index') }}"
        buttonIcon="<i class='fas fa-chevron-left'></i>"
    />


    <div class="container-fluid px-lg-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.billing.transactions.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <x-forms.text-input-field type="date" label="Transaction Date" name="transaction_date" required="true"/>
                                </div>
                                <div class="col-md-6">
                                    <x-forms.search-select-input-field
                                        label="Client"
                                        name="client_id"
                                        :collection="$clients"
                                        displayField="full_name"
                                        required="false"
                                        :selectedValue="old('client_id')"
                                    />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <x-forms.text-input-field type="text" label="Description" name="description" required="false" value="{{ old('description') }}"/>
                                </div>
                                <div class="col-md-4">
                                    <x-forms.text-input-field type="text" label="Transaction ID" name="transaction_id" required="false" value="{{ old('transaction_id') }}"/>
                                </div>
                                <div class="col-md-4">
                                    <x-forms.text-input-field type="text" label="Invoice ID" name="invoice_id" required="false" value="{{ old('invoice_id') }}"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <x-forms.text-input-field type="number" label="Amount In" name="amount_in" required="false" step="any" value="{{ old('amount_in') }}"/>
                                </div>
                                <div class="col-md-3">
                                    <x-forms.text-input-field type="number" label="Amount Out" name="amount_out" required="false" step="any" value="{{ old('amount_out') }}"/>
                                </div>
                                <div class="col-md-3">
                                    <x-forms.text-input-field type="number" label="Fees" name="amount_fees" required="false" step="any" value="{{ old('amount_fees') }}"/>
                                </div>
                                <div class="col-md-3">
                                    <x-forms.select-input-field
                                        label="Payment Method"
                                        name="payment_method"
                                        :options="['bank_transfer' => 'Bank Transfer', 'credit_debit_card' => 'Credit/Debit Card', 'direct_debit' => 'Direct Debit', 'cash' => 'Cash', 'paypal' => 'PayPal', 'other' => 'Other']"
                                        required="true"
                                        :selectedValue="old('payment_method')"
                                    />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <x-forms.select-input-field
                                        label="Add to clients credit balance?"
                                        name="add_to_credit_balance"
                                        :options="['yes' => 'Yes', 'no' => 'No']"
                                        required="false"
                                        :selectedValue="old('add_to_credit_balance', 'no')"
                                    />
                                </div>
                            </div>



                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="primarySolidBtn"><i class="fas fa-save"></i>Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
