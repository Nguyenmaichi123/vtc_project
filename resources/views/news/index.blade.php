@vite('resources/scss/news.scss')
@extends('layouts.app')

@section('content')


<!-- Nội dung chính -->
<div class="container my-5">
    <div class="head d-flex ">
        <a href="{{ url('/') }}" class="me-1 text-decoration-none text-dark">Trang chủ ></a>
        <span class="fw-bold">Tin tức </span>
    </div>
    <hr>


    <div class="row">
        <div class="title-head-title">
            <h1>TIN TỨC</h1>
        </div>

        <div class="col-md-3">
            <div class="Bv">
                <h2 class="title bvmn">
                    <span>
                        <a href="/tin-tuc" title="Bài viết mới nhất">Bài viết mới nhất</a>
                    </span>
                </h2>

            </div>
            <div class="content">
            </div>
            @foreach ( $news as $new )
            <a href="{{ url('/tin-tuc/' . $new->slug) }}">
                <h6>{{ $new->title }}</h6>
                <h5 class="text-muted fst-italic"> {{ $new->created_at->format('d/m/Y') }}</h5>
            </a>
            <hr>

            @endforeach
            <div class="banner">
                <a href="">
                    <img src="{{ asset('uploads/news/' ."banner_blog_1.jpg") }}" alt="">
                </a>
                <a href="">
                    <img src="{{ asset('uploads/news/' . "banner_blog_2.jpg") }}" alt="">
                </a>
            </div>
        </div>

        <div class="col-md-9">
            @foreach ($news as $new)
            <div class="news-item mb-4">
                <!-- Hiển thị hình ảnh -->
                <a href="#">
                    <img src="{{ asset('uploads/news/' . $new->image) }}" alt="{{ $new->title }}" class="img-fluid w-100 rounded">
                </a>
                <hr>
                <!-- Hiển thị tiêu đề bài viết -->
                <a href="{{ route('news.show1', ['slug' => $new->slug]) }}" class="text-dark fw-bold text-decoration-none">
                    <h2> {{ $new->title }}</h2>
                </a>
                <div class="a">
                    <h3>{{ $new->content }}</h3>
                </div>

                <a href="{{ route('news.show1', ['slug' => $new->slug]) }}" class="btn btn-dark text-uppercase fw-bold">Đọc thêm</a>
            </div>

            <!-- Đường kẻ ngăn cách bài viết -->
            <hr>
            @endforeach
        </div>


    </div>
</div>
@endsection