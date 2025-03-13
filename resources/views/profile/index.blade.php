@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Profile</h2>
    <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
    <div class="mt-3">
        <img src="{{ asset($profile->avatar ?? 'default-avatar.png') }}" width="150">
        <p><strong>Name:</strong> {{ $profile->full_name }}</p>
        <p><strong>Phone:</strong> {{ $profile->phone }}</p>
        <p><strong>Address:</strong> {{ $profile->address }}</p>
    </div>
    <a href="{{ route('password.edit') }}">đổi mật khẩu</a>
</div>
@endsection