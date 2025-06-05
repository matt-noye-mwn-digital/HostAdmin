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
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Full Name</th>
                                        <th>Company Name</th>
                                        <th>Email</th>
                                        <th>Services</th>
                                        <th>Created</th>
                                        <th>Status</th>
                                        <th class="actions"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($clients as $client)
                                        <tr>
                                            <td>{{ $client->id }}</td>
                                            <td>{{ $client->clientUser->full_name }}</td>
                                            <td>{{ $client->company_name ?? '--' }}</td>
                                            <td>{{ $client->clientUser->email }}</td>
                                            <td>--</td>
                                            <td>{{ date('d/m/Y', strtotime($client->created_at)) }}</td>
                                            <td>{!! $client->getStatus() !!}</td>
                                            <td class="actions">
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li>
                                                            <a href="">View</a>
                                                        </li>
                                                        <li>
                                                            <a href="">Edit</a>
                                                        </li>
                                                        <li>
                                                            <form action="" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit">
                                                                    Delete
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="">
                    {{ $clients->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
