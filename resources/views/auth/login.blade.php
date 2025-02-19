@extends('layouts.app')

@vite('resources/scss/auth.scss')

@section('content')
<div class="auth-container d-flex align-items-center justify-content-center">
    <div class="login-card">
        <div class="login-header text-center">
            <img src="{{ asset('storage/logo.png') }}" alt="" alt="Logo" class="logo">
            <h2>Đăng Nhập</h2>
        </div>
        <div class="login-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- Remember Me & Forgot Password --}}
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Ghi nhớ đăng nhập</label>
                    </div>
                    @if (Route::has('password.request'))
                    <a class="forgot-password" href="{{ route('password.request') }}">Quên mật khẩu?</a>
                    @endif
                </div>

                {{-- Submit Button --}}
                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-100">Đăng Nhập</button>
                </div>
                {{-- OR separator --}}
                <div class="text-center my-3">
                    <span class="or-divider">Hoặc</span>
                </div>

                {{-- Social Login --}}
                <div class="social-login text-center mb-3">
                    <button type="button" class="btn btn-google"><img src="/images/google.png" alt="Google"> Đăng nhập với Google</button>
                    <button type="button" class="btn btn-facebook"><img src="/images/facebook.png" alt="Facebook"> Đăng nhập với Facebook</button>
                </div>


                {{-- Register Link --}}
                <div class="text-center mt-3">
                    <p>Chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký ngay</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection