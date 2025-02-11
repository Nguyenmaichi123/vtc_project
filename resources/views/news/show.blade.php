@extends('layouts.app')


{{-- Thiết lập tiêu đề trang và tiêu đề hiện trên Navigation (phần 2) --}}
@section('title', $news->title ?? 'Màu sắc lòe loẹt dành cho phái mạnh')

@section('nav-current')
<li class="nav-item">
    <a class="nav-link active" href="#">{{ $news->title ?? 'Màu sắc lòe loẹt dành cho phái mạnh' }}</a>
</li>
@endsection

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
                <li class="nav-item"><a class="nav-link" href="{{ url('/tin-tuc') }}">Tin tức</a></li>
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

{{-- 5. Sidebar: Hiển thị danh sách bài viết mới nhất --}}
@section('sidebar')
<div class="card">
    <div class="card-header">
        Bài viết mới nhất
    </div>
    <ul class="list-group list-group-flush">
        @if(isset($recentNews) && count($recentNews))
        @foreach($recentNews as $item)
        <li class="list-group-item">
            <a href="{{ route('news.show', $item->slug) }}">{{ $item->title }}</a>
            <br>
            <small class="text-muted">{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</small>
        </li>
        @endforeach
        @else
        <!-- Nội dung mẫu nếu chưa có dữ liệu từ Controller -->
        <li class="list-group-item">
            <a href="#">Sơmi denim cho chàng khoe cá tính</a>
            <br>
            <small class="text-muted">20/10/2015</small>
        </li>
        <li class="list-group-item">
            <a href="#">Quý ông: mặc gì để 'trẻ mãi không già'?</a>
            <br>
            <small class="text-muted">18/10/2015</small>
        </li>
        @endif
    </ul>
</div>
@endsection

{{-- 3. Nội dung chính của bài viết --}}
@section('content')
<article>
    <!-- Tiêu đề bài viết -->
    <h1>{{ $news->title ?? 'Màu sắc lòe loẹt dành cho phái mạnh' }}</h1>

    <!-- Thông tin phụ: Ngày đăng và tên tác giả/thể loại -->
    <p class="text-muted">
        Đăng ngày: {{ isset($news->created_at) ? \Carbon\Carbon::parse($news->created_at)->format('d/m/Y') : '26/10/2015' }}
        | bởi {{ $news->author ?? 'Bizweb Theme' }}
    </p>

    <!-- Nội dung giới thiệu bài viết -->
    <div class="mb-4">
        <p>
            Bài viết này giới thiệu về những xu hướng phối màu nổi bật, giúp phái mạnh tự tin thể hiện phong cách của mình qua từng bộ trang phục.
        </p>
    </div>

    <!-- 4. Hình ảnh minh họa -->
    @if(isset($news->image) && $news->image)
    <div class="mb-4">
        <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="img-fluid">
    </div>
    @else
    <div class="mb-4">
        <!-- Nếu chưa có hình, bạn có thể sử dụng hình mẫu -->
        <img src="{{ asset('images/sample-news.jpg') }}" alt="Hình minh họa" class="img-fluid">
    </div>
    @endif

    <!-- Nội dung chi tiết bài viết -->
    <div class="mb-4">
        {!! $news->content ?? '
        <p>Trong bài viết này, bạn sẽ được tìm hiểu chi tiết về các màu sắc thời trang, cách phối hợp chúng một cách tinh tế và độc đáo.
            Cùng khám phá các gợi ý phối đồ cho từng phong cách khác nhau.</p>
        ' !!}
    </div>

    <!-- 6. Phần chân bài viết (Body Footer): Giải thích về từng màu sắc và hướng dẫn phối đồ -->
    <div class="border-top pt-3">
        <h5>Giải thích về các màu sắc:</h5>
        <p><strong>Màu xanh dương:</strong> Mang lại cảm giác mát mẻ, chuyên nghiệp. Hướng dẫn phối đồ: Kết hợp với màu trắng hoặc xám để tăng sự lịch lãm.</p>
        <p><strong>Màu đỏ:</strong> Tạo điểm nhấn nổi bật và thu hút sự chú ý. Hướng dẫn phối đồ: Nên phối cùng màu đen hoặc denim để tạo sự cân bằng.</p>
        <p><strong>Màu xanh lá:</strong> Mang đến cảm giác tươi mới và năng động. Hướng dẫn phối đồ: Phối với màu be hoặc nâu để tăng sự ấm áp.</p>
        <!-- Bạn có thể thêm nhiều đoạn giải thích khác tùy theo nhu cầu -->
    </div>
</article>
@endsection