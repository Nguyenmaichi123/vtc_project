<!-- resources/views/news/outfit-tips.blade.php -->
@extends('layouts.app')

@section('content')
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