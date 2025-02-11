<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">GENTLEMAN</a>
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
                        <a class="nav-link dropdown-toggle" href="/all-product">SẢN PHẨM</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/on-sale-product">Sản phẩm khuyến mại</a></li>
                            <li class="nav-item dropdown">
                                <a class="dropdown-item dropdown-toggle" href="{{ route('product.bestSelling') }}">
                                    Sản phẩm nổi bật
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('product.bestSelling', ['category' => 'jackets']) }}">
                                            Áo khoác
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('product.bestSelling', ['category' => 'shirts']) }}">
                                            Áo sơ mi
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="dropdown-item" href="/new-product">Sản phẩm mới</a></li>
                        </ul>
                    </li>
                </ul>
                <li class="nav-item">
                    <a class="nav-link" href="#">LIÊN HỆ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">TIN TỨC</a>
                </li>
            </ul>
            <div class="d-flex align-items-center">
               
                <a href="#" class="me-3 text-decoration-none text-black">ĐĂNG NHẬP</a>
                <a href="#" class="text-decoration-none position-relative text-black">
                    <i class="bi bi-cart"></i> GIỎ HÀNG (0)
                </a>
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
    min-width: 200px; /* Đảm bảo kích thước phù hợp */
}

/* Hiển thị menu cấp 1 khi hover vào "Sản phẩm" */
.navbar-nav .nav-item.dropdown:hover > .dropdown-menu {
    display: block;
}

/* Ẩn submenu cấp 2 mặc định (chỉ hiển thị khi hover vào "Sản phẩm nổi bật") */
.navbar-nav .nav-item.dropdown .dropdown-menu .nav-item.dropdown .dropdown-menu {
    display: none;
    position: absolute;
    left: 100%; /* Để hiển thị sang phải */
    top: 0;
}

/* Hiển thị submenu khi hover vào "Sản phẩm nổi bật" */
.navbar-nav .nav-item.dropdown .dropdown-menu .nav-item.dropdown:hover > .dropdown-menu {
    display: block;
}


.navbar-nav .dropdown-menu .nav-item.dropdown > .dropdown-toggle {
    display: flex;
    align-items: center; /* Căn giữa theo chiều dọc */
    justify-content: space-between; /* Đẩy mũi tên sang phải */
    width: 100%; /* Đảm bảo mũi tên không bị đẩy lên trên */
}
/* Xoay mũi tên của "Sản phẩm nổi bật" sang phải */
.navbar-nav .dropdown-menu .nav-item.dropdown > .dropdown-toggle::after {
    transform: rotate(-90deg); /* Mũi tên quay ngang */
    float: right;
    line-height: 1.5;
}
</style>