<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Trang chủ')</title>

    <!-- Load Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Load SCSS -->
    @vite('resources/scss/App.scss')
    
</head>

<body>
    @include('layouts.Header')

    <div class="container my-5">
        <div class="head d-flex ">
            <a href="{{ url('/') }}" class="me-1 text-decoration-none text-dark">Trang chủ ></a>
            <a href="{{ url('/tin-tuc') }}" class="me-1 text-decoration-none text-dark">Tin tức ></a>
            @if(isset($news))
            <span class="fw-bold">{{ $new->title }}</span>
            @else
            <span class="fw-bold text-muted">Không tìm thấy bài viết</span>
            @endif
        </div>
        <hr>

        <div class="row">
          
            <div class="col-md-3">
                <div class="Bv">
                    <h2 class="title bvmn">
                        <span>
                            <a href="/tin-tuc" title="Bài viết mới nhất">Bài viết mới nhất</a>
                        </span>
                    </h2>

                </div>

                <div class="content">
                    @if(isset($news) )
                    @foreach ($news as $new)

                    <a href="{{ url('/tin-tuc/' . $new->slug) }}" class="text-decoration-none">
                        <h6>{{ $new->title }}</h6>
                        <h5 class="text-muted fst-italic"> {{ $new->created_at->format('d/m/Y') }}</h5>
                    </a>
                    <hr>
                    @endforeach
                    @else
                    <p class="text-muted">Không có bài viết nào.</p>
                    @endif
                </div>

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
                @yield('content')
            </div>


        </div>
    </div>

    @include('layouts.Footer')

    <!-- Load Bootstrap JS & FontAwesome -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" crossorigin="anonymous"></script>

    <!-- Load JS -->
    @vite('resources/js/app.js')
</body>

</html>