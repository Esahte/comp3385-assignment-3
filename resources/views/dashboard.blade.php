@extends('layouts.app')

@section('content')
    <h1 class="display-5 fw-bold text-body-emphasis">Dashboard</h1>
    <p class="lead">Welcome to your dashboard. Here you can manage your account, your clients and much more.</p>
{{--    loog over clients and print out the Clients name, email, tellephone, address and display the company_logo --}}
    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach($clients as $client)
            <div class="col">
                <div class="card">
                    <img src="{{ asset('storage/' . $client->company_logo) }}" class="card-img-top" alt="{{ $client->name }} Logo">
                    <div class="card-body">
                        <h5 class="card-title
                        ">{{ $client->name }}</h5>
                        <p class="card-text">{{ $client->email }}</p>
                        <p class="card-text">{{ $client->phone }}</p>
                        <p class="card-text">{{ $client->address }}</p>
                        <a href="{{ route('clients.show', $client->id) }}" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
