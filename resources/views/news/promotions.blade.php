<!-- resources/views/news/promotions.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    <p>{{ $description }}</p>

    <!-- Banner siêu giảm giá -->
    <div class="banner">
        <img src="path_to_discount_banner_image" alt="Khuyến mãi & giảm giá">
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
        <form method="GET" action="{{ route('promotions') }}">
            <select name="filter" onchange="this.form.submit()">
                <option value="brand">Giảm giá theo thương hiệu</option>
                <option value="category">Giảm giá theo danh mục</option>
            </select>
        </form>
    </div>
</div>
@endsection