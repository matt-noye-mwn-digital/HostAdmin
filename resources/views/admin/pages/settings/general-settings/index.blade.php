@extends('layouts.admin')
@push('page-title')
    General Settings
@endpush
@section('content')
    <x-dashboard.hero-banner
        title="General Settings"
        displayButton="yes"
        buttonContent="All Settings"
        buttonLink="{{ route('admin.settings.index') }}"
        buttonIcon="<i class='fas fa-chevron-left'></i>"
    />

    <div class="container-fluid px-lg-0">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header transparent-bg py-3">
                        <h5 class="card-title fs-1-5 fontSemiBold offBlack">Company Branding</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <x-forms.text-input-field type="text" label="Company Name" name="company_name" required="true"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <x-forms.text-input-field type="email" label="Main Email Address" name="main_email_address" required="true"/>
                                </div>
                                <div class="col-md-6">
                                    <x-forms.text-input-field type="tel" label="Main Telephone Number" name="main_telephone_number" required="false"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <x-forms.text-input-field type="url" label="Website URL" name="website_url" required="false"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="company_logo" class="form-label">Company Logo</label>
                                    <input type="file" class="form-control" id="company_logo" name="company_logo" accept="image/*">
                                    @error('company_logo')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="primarySolidBtn sm">
                                        <i class="fas fa-save"></i> Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header transparent-bg py-3">
                        <h5 class="card-title fs-1-5 fontSemiBold offBlack">Company Address</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <x-forms.text-input-field type="text" label="Address Line 1" name="address_line_one" required="true"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <x-forms.text-input-field type="text" label="Address Line 2" name="address_line_two" required="false"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <x-forms.text-input-field type="text" label="City" name="city" required="true"/>
                                </div>
                                <div class="col-md-6">
                                    <x-forms.text-input-field type="text" label="County/State/Province" name="county_state" required="true"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <x-forms.text-input-field type="text" label="Zip/Postal Code" name="zip_postcode" required="true"/>
                                </div>
                                <div class="col-md-6">
                                    <x-forms.text-input-field type="text" label="Country" name="country" required="true"/>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="primarySolidBtn sm">
                                        <i class="fas fa-save"></i> Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
