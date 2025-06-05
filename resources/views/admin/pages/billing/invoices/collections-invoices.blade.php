@extends('layouts.admin')
@push('page-title')
    All Collections Invoices
@endpush
@section('content')
    <x-dashboard.hero-banner
        title="All Collections Invoices"
        displayButton="yes"
        buttonContent="Create Invoice"
        buttonLink="{{ route('admin.billing.invoices.create') }}"
        buttonIcon="<i class='fas fa-plus'></i>"
    />
    @include('admin/pages/billing/invoices/_nav')
    <div class="container-fluid px-lg-0">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive-lg">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Invoice #</th>
                            <th>Client Name</th>
                            <th>Invoice Date</th>
                            <th>Due Date</th>
                            <th>Total</th>
                            <th>Payment Method</th>
                            <th>Status</th>
                            <th class="actions"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invoices as $invoice)
                            <tr>
                                <td>{{ $invoice->invoice_number }}</td>
                                <td>{{ $invoice->client->clientUser->full_name }}</td>
                                <td>{{ date('d/m/Y', strtotime($invoice->invoice_date)) }}</td>
                                <td>{{ date('d/m/Y', strtotime($invoice->due_date)) }}</td>
                                <td>£{{ number_format($invoice->total_amount, 2) }}</td>
                                <td>{{ $invoice->payment_method }}</td>
                                <td>{!! $invoice->getStatus() !!}</td>
                                <td class="actions">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a href="">View</a>
                                            </li>
                                            <li>
                                                <a href="">Edit</a>
                                            </li>
                                            <li>
                                                <form action="" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">Delete</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                {{ $invoices->links() }}
            </div>
        </div>
    </div>
@endsection
