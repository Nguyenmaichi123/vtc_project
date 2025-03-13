@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Đổi mật khẩu</h2>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('password.handle') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="current_password">Mật khẩu hiện tại</label>
            <input type="password" name="current_password" class="form-control">
            @error('current_password') <p class="text-danger">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="new_password">Mật khẩu mới</label>
            <input type="password" name="new_password" class="form-control">
            @error('new_password') <p class="text-danger">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="confirm_password">Xác nhận mật khẩu mới</label>
            <input type="password" name="confirm_password" class="form-control">
            @error('confirm_password') <p class="text-danger">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-2">Cập nhật</button>
    </form>
</div>
@endsection