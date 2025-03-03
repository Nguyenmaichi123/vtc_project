@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h2>Dashboard Tổng Quan</h2>

    <div class="row">
        <!-- Tổng doanh thu -->
        <div class="col-md-3">
            <div class="card bg-success text-white p-3">
                <h4>Doanh thu</h4>
               
                 <p>100</p>
            </div>
        </div>

        <!-- Tổng số đơn hàng -->
        <div class="col-md-3">
            <div class="card bg-primary text-white p-3">
                <h4>Đơn hàng</h4>
                <p> 100 </p>
            </div>
        </div>

        <!-- Tổng số sản phẩm -->
        <div class="col-md-3">
            <div class="card bg-warning text-white p-3">
                <h4>Sản phẩm</h4>
                <p>100 </p>
            </div>
        </div>

        <!-- Tổng số khách hàng -->
        <div class="col-md-3">
            <div class="card bg-danger text-white p-3">
                <h4>Khách hàng</h4>
                <p>100 </p>
            </div>
        </div>
    </div>

    <!-- Thống kê đơn hàng -->
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card p-3">
                <h4>Thống kê đơn hàng</h4>
                <ul>
                    <li>Chờ xử lý: 100</li>
                    <li>Đang giao: 100</li>
                    <li>Hoàn thành: 100</li>
                    <li>Đã hủy: 100</li>
                </ul>
            </div>
        </div>

        <!-- Biểu đồ doanh thu -->
        <div class="col-md-6">
            <div class="card p-3">
                <h4>Biểu đồ doanh thu</h4>
                <canvas id="revenueChart"></canvas>
            </div>
        </div>
    </div>
</div>


@endsection