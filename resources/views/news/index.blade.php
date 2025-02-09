@extends('layouts.app')

@section('content')
<!-- Thanh điều hướng -->
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

<!-- Banner hoặc Slider -->
<div id="newsBanner" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/banner1.jpg') }}" class="d-block w-100" alt="Banner 1">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/banner2.jpg') }}" class="d-block w-100" alt="Banner 2">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#newsBanner" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#newsBanner" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- Nội dung chính -->
<div class="container my-5">
    <div class="row">
        <!-- Cột danh mục tin tức -->
        <aside class="col-md-3">
            <h5>Danh mục tin tức</h5>
            <ul class="list-group">
                <li class="list-group-item"><a href="/fashion-trends">Xu hướng thời trang</a></li>
                <li class="list-group-item"><a href="/promotions">Khuyến mãi & giảm giá</a></li>
                <li class="list-group-item"><a href="/outfit-tips">Phối đồ & mẹo mặc đẹp</a></li>
                <li class="list-group-item"><a href="/product-reviews">Review sản phẩm</a></li>
                <li class="list-group-item"><a href="/brand-news">Tin tức thương hiệu</a></li>
            </ul>
        </aside>

        <!-- Cột bài viết -->
        <main class="col-md-9">
            <h4 class="mb-4">Bài viết mới nhất</h4>
            <div class="row">
                @foreach ($news as $item)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ asset('storage/'.$item->image) }}" class="card-img-top" alt="{{ $item->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text">{{ Str::limit($item->content, 100) }}</p>
                            <a href="{{ url('/news/'.$item->id) }}" class="btn btn-primary btn-sm">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <h4 class="mb-4">Bài viết nổi bật</h4>
            <div class="row">
                @foreach ($featuredNews as $featured)
                <div class="col-md-6">
                    <div class="card mb-4">
                        <img src="{{ asset('storage/'.$featured->image) }}" class="card-img-top" alt="{{ $featured->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $featured->title }}</h5>
                            <p class="card-text">{{ Str::limit($featured->content, 150) }}</p>
                            <a href="{{ url('/news/'.$featured->id) }}" class="btn btn-outline-primary btn-sm">Đọc thêm</a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </main>
    </div>
</div>

<!-- <footer class="bg-dark text-white text-center py-3">
    <p>&copy; 2025 FashionShop. Mọi quyền được bảo lưu.</p>
</footer> -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection