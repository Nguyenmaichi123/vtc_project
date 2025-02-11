<!-- resources/views/news/outfit-tips.blade.php -->
@extends('layouts.app')

@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">

        <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Trang chủ</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/gioithieu') }}">Giới thiệu</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/product') }}">Sản phẩm</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/lien-he') }}">Liên Hệ</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/cart') }}">Giỏ hàng</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/account') }}">Tài khoản</a></li>
            </ul>
            <form class="d-flex ms-3" action="{{ url('/search') }}" method="GET">
                <input class="form-control me-2" type="search" name="q" placeholder="Tìm kiếm..." aria-label="Search">
                <button class="btn btn-outline-primary" type="submit">Tìm</button>
            </form>
        </div>
    </div>
</nav>

<div class="container">
    <h1>{{ $title }}</h1>
    <p>{{ $description }}</p>

    <!-- Banner chủ đề -->
    <div class="banner">
        <img src="path_to_outfit_banner_image" alt="Phối đồ & mẹo mặc đẹp">
    </div>

    <!-- Danh sách bài viết -->
    <div class="posts">
        @foreach($posts as $post)
        <div class="post-item">
            <h2><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></h2>
            <p>{{ $post->excerpt }}</p>
            <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">Đọc thêm</a>
        </div>
        @endforeach
    </div>

    <!-- Bộ lọc -->
    <div class="filters">
        <form method="GET" action="{{ route('outfit-tips') }}">
            <select name="filter" onchange="this.form.submit()">
                <option value="style">Phối đồ theo phong cách</option>
                <option value="body-type">Phối đồ theo dáng người</option>
                <option value="color">Mix đồ theo màu sắc</option>
            </select>
        </form>
    </div>
</div>
@endsection