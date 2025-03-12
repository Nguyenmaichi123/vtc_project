@extends('admin.layouts.master')

@section('content')
<div class="container-lg">
    <h2>Dashboard Tổng Quan</h2>

    <div class="row ">
        <!-- Tổng doanh thu -->
        <div class="col-md-3 mt-3">
            <div class="card bg-success text-white p-3">
                <h4>Doanh thu</h4>
                <p>{{ number_format($totalRevenue ?? 0,3) }} VND</p> <!-- 🟢 Tránh lỗi biến chưa tồn tại -->
            </div>
        </div>

        <!-- Tổng số đơn hàng -->
        <div class="col-md-3 mt-3">
            <div class="card bg-primary text-white p-3">
                <h4>Đơn hàng</h4>
                <p>{{ $totalOrders ?? 0 }}</p>
            </div>
        </div>

        <!-- Tổng số sản phẩm -->
        <div class="col-md-3 mt-3">
            <div class="card bg-warning text-white p-3">
                <h4>Sản phẩm</h4>
                <p>{{ $totalProducts ?? 0 }}</p>
            </div>
        </div>

        <!-- Tổng số khách hàng -->
        <div class="col-md-3 mt-3">
            <div class="card bg-danger text-white p-3">
                <h4>Khách hàng</h4>
                <p>{{ $totalCustomers ?? 0 }}</p>
            </div>
        </div>
    </div>

    <!-- Thống kê đơn hàng -->
    <div class="row mt-4">
        <div class="col-md-6 mt-3">
            <div class="card p-3">
                <h4>Thống kê đơn hàng</h4>
                <ul>
                    <li>Chờ xử lý: {{ $pendingOrders ?? 0 }}</li>
                    <li>Đang xử lý: {{ $processingOrders ?? 0 }}</li>
                    <li>Đã xác nhận: {{ $confirmedOrders ?? 0 }}</li>
                    <li>Đang giao: {{ $shippingOrders ?? 0 }}</li>
                    <li>Hoàn thành: {{ $completedOrders ?? 0 }}</li>
                    <li>Đã hủy: {{ $canceledOrders ?? 0 }}</li>
                </ul>
            </div>
        </div>

        <!-- Biểu đồ doanh thu -->
        <div class="col-md-6 mt-3">
            <div class="card p-3">
                <h4>Biểu đồ doanh thu</h4>
                <canvas id="revenueChart"></canvas>
            </div>
        </div>
    </div>
    <!-- Truyền dữ liệu từ PHP sang JS -->
    <input type="hidden" id="monthsData" value='@json($months)'>
    <input type="hidden" id="revenueData" value='@json($monthlyRevenue)'>
    <input type="hidden" id="orderStatusData"
        value='{{ json_encode([
        $pendingOrders ?? 0, 
        $processingOrders ?? 0, 
        $confirmedOrders ?? 0, 
        $shippingOrders ?? 0, 
        $completedOrders ?? 0, 
        $canceledOrders ?? 0
    ]) }}'>


</div>

<!-- Script để vẽ biểu đồ -->


@endsection

@section('scripts')



@endsection