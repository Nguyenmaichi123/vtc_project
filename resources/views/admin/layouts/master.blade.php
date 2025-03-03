<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Quản lý sản phẩm</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="bg-dark text-white p-3" style="width: 250px; height: 100vh;">
            <h3 class="text-center">Admin Panel</h3>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Bảng điều khiển</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('products.index') }}"><i class="fa fa-box"></i> Quản lý sản phẩm</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('users.index') }}"><i class="fa fa-users"></i> Quản lý khách hàng</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('orders.index') }}"><i class="fa fa-shopping-cart"></i> Quản lý đơn hàng</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-grow-1 p-4">
            @yield('content')
        </div>
    </div>
</body>

</html>