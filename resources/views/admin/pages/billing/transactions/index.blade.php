@extends('layouts.admin')
@push('page-title')
    All Transactions
@endpush
@section('content')
    <x-dashboard.hero-banner
        title="All Transactions"
        displayButton="yes"
        buttonContent="Add Transaction"
        buttonLink="{{ route('admin.billing.transactions.create') }}"
        buttonIcon="<i class='fas fa-plus'></i>"
    />

    <div class="container-fluid px-lg-0">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive-lg">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Client Name</th>
                                <th>Date</th>
                                <th>Payment Method</th>
                                <th>Description</th>
                                <th>Amount In</th>
                                <th>Amount Out</th>
                                <th>Fees</th>
                                <th class="actions"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->client->full_name ?? '--' }}</td>
                                    <td>{{ date('d/m/Y', strtotime($transaction->transaction_date)) }}</td>
                                    <td>{{ str_replace('_', ' ', $transaction->payment_method) }}</td>
                                    <td>{{ $transaction->description ?: '--' }}</td>
                                    <td>£{{ number_format($transaction->amount_in, 2) }}</td>
                                    <td>£{{ number_format($transaction->amount_out, 2) }}</td>
                                    <td>£{{ number_format($transaction->amount_fees, 2) }}</td>
                                    <td class="actions">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a href="">View</a></li>
                                                <li><a href="">Edit</a></li>
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
            <div class="row">
                <div class="col-12">
                    {{ $transactions->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
