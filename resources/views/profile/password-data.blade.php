@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Dữ liệu mật khẩu đã nhập</h2>

    <p><strong>Mật khẩu hiện tại:</strong> {{ $data['current_password'] }}</p>
    <p><strong>Mật khẩu mới:</strong> {{ $data['new_password'] }}</p>
    <p><strong>Xác nhận mật khẩu mới:</strong> {{ $data['confirm_password'] }}</p>

    <a href="{{ route('password.edit') }}" class="btn btn-primary">Quay lại</a>
</div>
@endsection