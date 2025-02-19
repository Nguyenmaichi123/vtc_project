@extends('layouts.app')
@vite('resources/scss/auth.scss')

@section('content')
<div class="auth-container d-flex align-items-center justify-content-center">
    <div class="reset-password-card">
        <div class="reset-password-header text-center">
            <h2>Đặt lại mật khẩu</h2>
            <p>Vui lòng nhập mật khẩu mới</p>
        </div>
        <div class="reset-password-body">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                {{-- Email --}}
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu mới</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div class="mb-3">
                    <label for="password-confirm" class="form-label">Xác nhận mật khẩu</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password">
                </div>

                {{-- Submit Button --}}
                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-100">Đặt lại mật khẩu</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection