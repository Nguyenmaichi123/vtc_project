@extends('layouts.app')
@vite('resources/scss/auth.scss')
@section('content')
<div class="auth-container d-flex align-items-center justify-content-center">
    <div class="register-card">
        <div class="register-header text-center">
            <h2>Đăng Ký</h2>
        </div>
        <div class="register-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- Name --}}
                <div class="mb-3">
                    <label for="name" class="form-label">Họ và Tên</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    </div>
                    @error('name')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email">
                    </div>
                    @error('email')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="new-password">
                    </div>
                    @error('password')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div class="mb-3">
                    <label for="password-confirm" class="form-label">Xác nhận mật khẩu</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password">
                    </div>
                </div>

                {{-- Submit Button --}}
                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-100">Đăng Ký</button>
                </div>

                {{-- OR separator --}}
                <div class="text-center my-3">
                    <span class="or-divider">Hoặc</span>
                </div>

                {{-- Social Login --}}
                <!-- <div class="social-login">
                    <a href="#" class="btn btn-danger w-100 mb-2">
                        <i class="bi bi-google"></i> Đăng ký với Google
                    </a>
                    <a href="#" class="btn btn-primary w-100">
                        <i class="bi bi-facebook"></i> Đăng ký với Facebook
                    </a>
                </div> -->

                {{-- Login Link --}}
                <div class="text-center mt-3">
                    <p>Đã có tài khoản? <a href="{{ route('login') }}">Đăng nhập ngay</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection