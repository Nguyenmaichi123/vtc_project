<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Quản lý sản phẩm</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite('resources/css/admin.css')
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark test ">
        <div class="container-fluid ">
            <a class="navbar-brand text-white" href="#">Admin Panel</a>
            <button class="navbar-toggler  text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon "> <i class="fa fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item ">
                        <a class="nav-link active text-white" aria-current="page" href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Bảng điều khiển</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-white" href="{{ route('products.index') }}"><i class="fa fa-box"></i> Quản lý sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('users.index') }}"><i class="fa fa-users"></i> Quản lý khách hàng</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-white" href="{{ route('orders.index') }}"><i class="fa fa-shopping-cart"></i> Quản lý đơn hàng</a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="fa fa-sign-out-alt"></i> Đăng xuất
                            </button>
                        </form>
                    </li>
                </ul>


            </div>
        </div>

    </nav>

    <!-- Sidebar + Nội dung chính -->
    <div class="d-flex ">
        <!-- Sidebar -->
        <div class="bg-dark text-white p-3 test2" style="width: 250px; height: 100vh;">
            <h3 class="text-center">Admin Panel</h3>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Bảng điều khiển</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('products.index') }}"><i class="fa fa-box"></i> Quản lý sản phẩm</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('users.index') }}"><i class="fa fa-users"></i> Quản lý khách hàng</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('orders.index') }}"><i class="fa fa-shopping-cart"></i> Quản lý đơn hàng</a></li>
                <li class="nav-item">
                    <a>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="fa fa-sign-out-alt"></i> Đăng xuất
                            </button>
                        </form>
                </li>
                </a>
            </ul>

        </div>

        <!-- Main Content -->
        <div class="flex-grow-1 p-4">
            @yield('content')
        </div>
    </div>
</body>

</html>
<script @vite('resources/js/dashboard.js')></script>
<script @vite('resources/js/alert.js')></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>