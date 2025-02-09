<!-- resources/views/news/fashion-trends.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    <p>{{ $description }}</p>

    <!-- Banner chủ đề -->
    <div class="banner">
        <img src="path_to_banner_image" alt="Xu hướng thời trang">
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
        <form method="GET" action="{{ route('fashion-trends') }}">
            <select name="filter" onchange="this.form.submit()">
                <option value="newest">Xu hướng mới nhất</option>
                <option value="brand">Theo thương hiệu</option>
                <option value="style">Theo phong cách</option>
            </select>
        </form>
    </div>
</div>
@endsection