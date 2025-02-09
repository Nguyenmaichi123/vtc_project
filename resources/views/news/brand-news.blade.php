<!-- resources/views/news/brand-news.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    <p>{{ $description }}</p>

    <!-- Banner thương hiệu -->
    <div class="banner">
        <img src="path_to_brand_banner_image" alt="Tin tức thương hiệu">
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
        <form method="GET" action="{{ route('brand-news') }}">
            <select name="filter" onchange="this.form.submit()">
                <option value="brand">Tin tức theo thương hiệu</option>
                <option value="event">Sự kiện thời trang</option>
                <option value="collaboration">Hợp tác & BST mới</option>
            </select>
        </form>
    </div>
</div>
@endsection