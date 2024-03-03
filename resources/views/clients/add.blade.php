@extends('layouts.app')

@section('content')
    <div class="px-4 py-5 my-5 text-center bg-body-tertiary rounded-3">
        <img class="img-fluid" src="{{ asset('images/UWI-Wordmark.webp') }}" alt="UWI Wordmark" width="300"/>
        <h1 class="display-5 fw-bold text-body-emphasis">Create Client</h1>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-lg-6 mx-auto">
            <form action="{{ route('clients') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required
                           pattern="^\d{3}-\d{3}-\d{4}$">
                    <small>Format: 123-456-7890</small>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" id="address" name="address" required
                              placeholder="3383 Antigua Ave, Five Islands Village, Antigua & Barbuda">{{ old('address') }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="logo" class="form-label">Company Logo</label>
                    <input type="file" class="form-control" id="logo" name="logo" required>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
