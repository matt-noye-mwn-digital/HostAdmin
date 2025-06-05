@extends('layouts.admin')
@push('page-title')
    All Settings
@endpush
@section('content')
    <x-dashboard.hero-banner
        title="All Settings"
        displayButton="no"
    />
    <div class="container-fluid px-lg-0">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <a href="{{ route('admin.settings.general-settings.index') }}">
                        <div class="card-header no-border text-center py-3">
                            <h5 class="card-title fs-1-5 fontSemiBold">General Settings</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <a href="">
                        <div class="card-header no-border text-center py-3">
                            <h5 class="card-title fs-1-5 fontSemiBold">Servers</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <a href="">
                        <div class="card-header no-border text-center py-3">
                            <h5 class="card-title fs-1-5 fontSemiBold">Products/Services</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <a href="">
                        <div class="card-header no-border text-center py-3">
                            <h5 class="card-title fs-1-5 fontSemiBold">Admins</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <a href="">
                        <div class="card-header no-border text-center py-3">
                            <h5 class="card-title fs-1-5 fontSemiBold">Domain Pricing</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <a href="">
                        <div class="card-header no-border text-center py-3">
                            <h5 class="card-title fs-1-5 fontSemiBold">Support Departments</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <a href="">
                        <div class="card-header no-border text-center py-3">
                            <h5 class="card-title fs-1-5 fontSemiBold">Email Templates</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <a href="">
                        <div class="card-header no-border text-center py-3">
                            <h5 class="card-title fs-1-5 fontSemiBold">Client Groups</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <a href="">
                        <div class="card-header no-border text-center py-3">
                            <h5 class="card-title fs-1-5 fontSemiBold">Domain Registrars</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <a href="">
                        <div class="card-header no-border text-center py-3">
                            <h5 class="card-title fs-1-5 fontSemiBold">Payment Gateways</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <a href="">
                        <div class="card-header no-border text-center py-3">
                            <h5 class="card-title fs-1-5 fontSemiBold">Currencies</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <a href="">
                        <div class="card-header no-border text-center py-3">
                            <h5 class="card-title fs-1-5 fontSemiBold">Ticket Statuses</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
