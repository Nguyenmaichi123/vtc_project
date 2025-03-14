<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">GENTLEMAN</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link home" href="/">TRANG CHỦ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/gioithieu">GIỚI THIỆU</a>
                </li>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <!-- <a class="nav-link dropdown-toggle" href="/product">SẢN PHẨM</a> -->
                        <a class="nav-link dropdown-toggle" href="{{ route('products.index') }}">SẢN PHẨM</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('products.onSale') }}">Sản phẩm khuyến mại</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="dropdown-item" href="{{ route('products.bestSelling') }}">
                                    Sản phẩm nổi bật
                                </a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('products.new') }}">Sản phẩm mới</a></li>
                        </ul>
                    </li>
                </ul>
                <li class="nav-item">
                    <a class="nav-link" href="/lien-he">LIÊN HỆ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/tin-tuc">TIN TỨC</a>
                </li>

            </ul>
            <div class="d-flex align-items-center">

                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
                <a href="{{ route('cart.show') }}" class="nav-link d-flex align-items-center justify-contents-center  position-relative">

                    <i class="fa fa-shopping-cart fs-5  me-2"></i> 
                    <span class="cart-text " >Giỏ hàng</span>

                    <span id="cart-count" class="badge bg-danger position-absolute top-0 start-100 translate-middle rounded-pill">
                        0
                    </span>
                </a>

                


                    <div class="container d-flex justify-content-center align-items-center">
                        <!-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> -->

                       
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav me-auto">

                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ms-auto">
                                <!-- Authentication Links -->
                                @guest
                                @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @endif

                                @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                                @endif
                                @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>


                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                            @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @endif

                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                @endguest
                            </ul>
                       


                                        @csrf
                                    </form>
                                    <a href="{{ route('profile.index') }}">View profile</a>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>

                </div>


            </div>

        </div>
    </div>
</nav>

<!-- Banner Section -->
<div class="container mt-4">
    <div class="row">
        <div class="col-md-4 text-center">
            <div class="p-3 border bg-dark text-light">MIỄN PHÍ VẬN CHUYỂN</div>
        </div>
        <div class="col-md-4 text-center">
            <div class="p-3 border bg-dark text-light">MIỄN PHÍ ĐỔI TRẢ</div>
        </div>
        <div class="col-md-4 text-center">
            <div class="p-3 border bg-dark text-light">THANH TOÁN TRỰC TUYẾN</div>
        </div>
    </div>

</div>

<style>
    /* Ẩn tất cả dropdown mặc định */
    .navbar-nav .dropdown-menu {
        display: none;
        position: absolute;
        background-color: white;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        min-width: 200px;
        /* Đảm bảo kích thước phù hợp */
    }

    /* Hiển thị menu cấp 1 khi hover vào "Sản phẩm" */
    .navbar-nav .nav-item.dropdown:hover>.dropdown-menu {
        display: block;
    }

    /* Ẩn submenu cấp 2 mặc định (chỉ hiển thị khi hover vào "Sản phẩm nổi bật") */
    .navbar-nav .nav-item.dropdown .dropdown-menu .nav-item.dropdown .dropdown-menu {
        display: none;
        position: absolute;
        left: 100%;
        /* Để hiển thị sang phải */
        top: 0;
    }

    /* Hiển thị submenu khi hover vào "Sản phẩm nổi bật" */
    .navbar-nav .nav-item.dropdown .dropdown-menu .nav-item.dropdown:hover>.dropdown-menu {
        display: block;
    }


    .navbar-nav .dropdown-menu .nav-item.dropdown>.dropdown-toggle {
        display: flex;
        align-items: center;
        /* Căn giữa theo chiều dọc */
        justify-content: space-between;
        /* Đẩy mũi tên sang phải */
        width: 100%;
        /* Đảm bảo mũi tên không bị đẩy lên trên */
    }

    /* Xoay mũi tên của "Sản phẩm nổi bật" sang phải */
    .navbar-nav .dropdown-menu .nav-item.dropdown>.dropdown-toggle::after {
        transform: rotate(-90deg);
        /* Mũi tên quay ngang */
        float: right;
        line-height: 1.5;
    }

    #cart-count {

    font-size: 10px;
    padding: 5px 8px;
    min-width: 22px;
    text-align: center;
    color: white;
    top: 5px;
    right: 5px;

    
}




    }
</style>