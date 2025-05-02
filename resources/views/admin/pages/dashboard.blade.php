@extends('layouts.admin')
@push('page-title')
    Dashboard
@endpush
@section('content')
    <section class="dashboardPageTitleBanner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>@stack('page-title')</h1>
                    <p>Overview of your system</p>
                </div>
            </div>
        </div>
    </section>
@endsection
