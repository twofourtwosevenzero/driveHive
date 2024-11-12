@extends('layouts.app')

@section('content')

<div class="auth-container">
    <h2>Login to DriveHive</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" class="form-control" name="password" required>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Login Button -->
        <button type="submit" class="btn btn-gold mt-3">Login</button>

        <!-- Register Link -->
        <p class="text-center text-white mt-3">
            Don’t have an account? <a href="{{ route('register') }}">Register</a>
        </p>
    </form>
</div>

@endsection
