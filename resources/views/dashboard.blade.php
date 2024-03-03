@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Dashboard</h1>
        <a href="{{ asset('clients/add') }}" class="btn btn-primary">+ Create Client</a>
    </div>
    <p class="lead">Welcome to your dashboard. Here you can manage your account, your clients and much more.</p>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($clients as $client)
            <div class="col">
                <div class="card text-center h-100">
                    <div class="h-70">
                        <img src="{{ asset('storage/images/' . $client->company_logo) }}" class="card-img-top p-2 h-2"
                             alt="{{ $client->name }} Logo">
                    </div>
                    <div class="card-body" style="background-color: #f6f7f8; padding: 15px;">
                        <h3 class="card-title" style="color: #0d6efd">{{ $client->name }}</h3>
                        <p class="card-text my-0"><a href="{{ $client->email }}">{{ $client->email }}</a></p>
                        <p class="card-text my-0">{{ $client->telephone }}</p>
                        <p class="card-text my-0">{{ $client->address }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
