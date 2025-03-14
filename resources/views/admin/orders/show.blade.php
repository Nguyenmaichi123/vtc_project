@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h1 class="mb-4">Chi tiết Đơn hàng #{{ $order->id }}</h1>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $order->id }}</td>
        </tr>
        <tr>
            <th>Khách hàng</th>
            <td>{{ $order->user->name ?? 'Khách hàng không tồn tại' }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $order->user->email ?? 'Không có email' }}</td>
        </tr>
        <tr>
            <th>Số điện thoại</th>
            <td>{{ $order->phone }}</td>
        </tr>
        <tr>
            <th>Địa chỉ giao hàng</th>
            <td>{{ $order->address }}</td>
        </tr>
        <tr>
            <th>Ngày đặt hàng</th>
            <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
        </tr>
        <tr>
            <th>Trạng thái</th>
            <td>
                <span class="badge bg-{{ $order->status == 'pending' ? 'warning' : ($order->status == 'completed' ? 'success' : 'primary') }}">
                    {{ ucfirst($order->status) }}
                </span>
            </td>
        </tr>
        <tr>
            <th>Tổng tiền</th>
            <td><strong>{{ number_format($order->total_price) }} VND</strong></td>
        </tr>
    </table>

    <h3 class="mt-4">Sản phẩm trong đơn hàng</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @if ($order->orderItems->isNotEmpty())
            @foreach ($order->orderItems as $item)
            <tr>
                <td>{{ $item->product->name ?? 'Sản phẩm không tồn tại' }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->price) }} VND</td>
                <td>{{ number_format($item->quantity * $item->price) }} VND</td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="4" class="text-center text-danger">Không có sản phẩm trong đơn hàng</td>
            </tr>
            @endif
        </tbody>
    </table>

    <div class="mt-3">
        <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-primary">Chỉnh sửa</a>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Quay lại</a>
    </div>
</div>
@endsection