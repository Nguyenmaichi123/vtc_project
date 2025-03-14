@vite('resources/scss/admin_edituser.scss')
@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h1 class="mb-4">Chi tiết Khách hàng</h1>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $user->id }}</td>
        </tr>
        <tr>
            <th>Tên</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $user->email }}</td>
        </tr>

        <tr>
            <th>Ngày tạo</th>
            <td>{{ $user->created_at->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Ngày đặt</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->created_at->format('d/m/Y') }}</td>
                        <td>{{ number_format($order->phone) }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ number_format($order->total_price) }} VND</td>
                        <td>{{ $order->status }}</td>
                        <td>
                            <a href="{{ route('admin.customers.edit', $order->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Sửa</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </tr>

    </table>

    <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary">Quay lại</a>
</div>
@endsection