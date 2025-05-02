@extends('layouts.admin')
@push('page-title')
    All Clients
@endpush
@section('content')
    <section class="dashboardPageTitleBanner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>@stack('page-title')</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="dashboardPageMain">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive-lg">
                        <table class="table w-100">
                            <thead></thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
