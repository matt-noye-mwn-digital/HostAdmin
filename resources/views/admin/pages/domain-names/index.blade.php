@extends('layouts.admin')
@push('page-title')
    All Domain Names
@endpush
@section('content')
    <x-dashboard.hero-banner
        title="All Domain Names"
        displayButton="yes"
        buttonContent="Add Domain Name"
        buttonLink="{{ route('admin.domain-names.create') }}"
        buttonIcon="<i class='fas fa-plus'></i>"
    />
@endsection
