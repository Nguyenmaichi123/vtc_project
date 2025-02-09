<!-- resources/views/news/product-reviews.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    <p>{{ $description }}</p>

    <!-- Banner review nổi bật -->
    <div class="banner">
        <img src="path_to_review_banner_image" alt="Review sản phẩm">
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
        <form method="GET" action="{{ route('product-reviews') }}">
            <select name="filter" onchange="this.form.submit()">
                <option value="rating">Sắp xếp theo đánh giá</option>
                <option value="brand">Theo thương hiệu</option>
                <option value="category">Theo danh mục</option>
            </select>
        </form>
    </div>
</div>
@endsection