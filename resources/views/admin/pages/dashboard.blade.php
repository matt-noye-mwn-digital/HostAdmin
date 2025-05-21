@extends('layouts.admin')
@push('page-title')
    Dashboard
@endpush
@section('content')
    <div class="container-fluid my-4">
        <div class="row align-items-center">
            <div class="col-md-6 ps-lg-0">
                <h1 class="offBlack fs-3">Dashboard</h1>
            </div>
            <div class="col-md-6 d-md-flex justify-content-md-end pe-lg-0">
                <p class="offBlack fs-1-5 mb-0 bodyReg">Last updated: <span id="localDateTime">{{ date('d/m/Y H:i:s') }}</span></p>

            </div>
        </div>
    </div>
@endsection
