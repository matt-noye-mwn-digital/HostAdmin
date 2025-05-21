@extends('layouts.admin')
@push('page-title')
    Create Client
@endpush
@section('content')
    <x-dashboard.hero-banner
        title="Create Client"
        displayButton="yes"
        buttonContent="All Client"
        buttonLink="{{ route('admin.clients.index') }}"
        buttonIcon="<i class='fas fa-chevron-left'></i>"
    />

    <div class="container-fluid px-lg-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.clients.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <x-forms.text-input-field type="text" label="First Name" name="first_name" required="true"/>
                                </div>
                                <div class="col-md-6">
                                    <x-forms.text-input-field type="text" label="Last Name" name="last_name" required="true"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <x-forms.text-input-field type="email" label="Email Address" name="email" required="true"/>
                                </div>
                                <div class="col-md-6">
                                    <x-forms.text-input-field type="tel" label="Telephone Number" name="telephone_number" required="false"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <x-forms.text-input-field type="text" label="Company Name" name="company_name" required="false"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <x-forms.text-input-field type="text" label="Address Line 1" name="address_line_one" required="false"/>
                                </div>
                                <div class="col-md-4">
                                    <x-forms.text-input-field type="text" label="Address Line 2" name="address_line_two" required="false"/>
                                </div>
                                <div class="col-md-4">
                                    <x-forms.text-input-field type="text" label="City" name="city" required="false"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <x-forms.text-input-field type="text" label="Postcode" name="postcode" required="false"/>
                                </div>
                                <div class="col-md-4">
                                    <x-forms.text-input-field type="text" label="Country" name="country" required="false"/>
                                </div>
                                <div class="col-md-4">
                                    <x-forms.select-input-field
                                        label="Status"
                                        name="status"
                                        :options="['active' => 'Active', 'inactive' => 'Inactive', 'suspended' => 'Suspended']"
                                        displayField="name"
                                        required="true"
                                    />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <x-forms.text-input-field type="url" label="Website" name="website" required="false"/>
                                </div>
                                <div class="col-md-6">
                                    <x-forms.text-input-field type="text" label="Stack User" name="stack_user" required="false"/>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">

                                </div>
                            </div>


                            <div class="row align-items-center mt-4">
                                <div class="col-md-6">
                                    <a class="" href="{{ route('admin.clients.index') }}"><i class="fas fa-chevron-left"></i> Cancel</a>
                                </div>
                                <div class="col-md-6 d-flex justify-content-end">
                                    <button type="submit" class="primarySolidBtn"><i class="fas fa-save"></i>Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
