@extends('layouts.guest.app')

@section('title', 'Login')

@section('content')
<div class="container mt-5" style="max-width: 400px;">
    <div class="card shadow">
        <div class="card-body">
            <h4 class="text-center mb-3">Login</h4>

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
</div>
@endsection
