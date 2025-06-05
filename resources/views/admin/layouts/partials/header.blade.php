<!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <!-- CSRF Token -->
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <title>@stack('page-title') - {{ config('app.name', 'Laravel') }}</title>

            <!-- Stylesheets -->
            <link rel="stylesheet" href="//cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">
            <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
            @stack('page-styles')

            <!-- Scripts -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script src="//cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            @stack('page-scripts')

            @vite(['resources/sass/app.scss', 'resources/sass/admin.scss', 'resources/js/app.js', 'resources/js/admin.js'])
        </head>
        <body>
        <div id="app">
            @include('admin/layouts/partials/sidebar')
            <main class="dashboardMainWrapper">
                @include('admin/layouts/partials/topbar')

