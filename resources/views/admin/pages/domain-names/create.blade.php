@extends('layouts.admin')
@push('page-title')
    Add Domain Name
@endpush
@section('content')
    <x-dashboard.hero-banner
        title="Add Domain Name"
        displayButton="yes"
        buttonContent="All Domain Names"
        buttonLink="{{ route('admin.domain-names.index') }}"
        buttonIcon="<i class='fas fa-chevron-left'></i>"
    />
@endsection
