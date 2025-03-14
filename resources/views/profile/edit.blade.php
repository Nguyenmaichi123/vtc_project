@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Chỉnh sửa hồ sơ</h2>
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Họ tên</label>
            <input type="text" name="full_name" class="form-control" value="{{ old('full_name', $profile->full_name ?? '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Số điện thoại</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $profile->phone ?? '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Địa chỉ</label>
            <input type="text" name="address" class="form-control" value="{{ old('address', $profile->address ?? '') }}">
        </div>

        <button type="submit" class="btn btn-success">Lưu</button>
    </form>
</div>
@endsection