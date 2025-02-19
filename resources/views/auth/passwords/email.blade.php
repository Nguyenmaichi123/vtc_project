@extends('layouts.app')
@vite('resources/scss/auth.scss')
@section('content')
<div class="auth-container d-flex align-items-center justify-content-center">
    <div class="forgot-password-card">
        <div class="forgot-password-header text-center">
            <h2>Quên Mật Khẩu</h2>
            <p>Nhập email của bạn để nhận liên kết đặt lại mật khẩu.</p>
        </div>
        <div class="forgot-password-body">
            @if (session('status'))
            <div class="alert alert-success text-center">
                {{ session('status') }}
            </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                {{-- Email Input --}}
                <div class="mb-3">
                    <label for="email" class="form-label">Địa chỉ Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    </div>
                    @error('email')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- Submit Button --}}
                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-100">Gửi liên kết đặt lại mật khẩu</button>
                </div>

                {{-- Back to Login --}}
                <div class="text-center mt-3">
                    <a href="{{ route('login') }}" class="back-to-login">
                        <i class="bi bi-arrow-left"></i> Quay lại đăng nhập
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection