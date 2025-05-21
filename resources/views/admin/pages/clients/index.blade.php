@extends('layouts.admin')
@push('page-title')
    All Clients
@endpush
@section('content')
    <x-dashboard.hero-banner
        title="All Clients"
        displayButton="yes"
        buttonContent="Create Client"
        buttonLink="{{ route('admin.clients.create') }}"
        buttonIcon="<i class='fas fa-plus'></i>"
    />

    <div class="container-fluid px-lg-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive-lg">
                            <table class="table">
                                <thead></thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
