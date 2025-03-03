@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h1 class="mb-4">Danh sách Đơn hàng</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Khách hàng</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Ngày đặt</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->name }}</td>
                <td>{{ number_format($order->total_price) }} VND</td>
                <td>{{ ucfirst($order->status) }}</td>
                <td>{{ $order->created_at->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info btn-sm">Xem</a>
                    <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                    <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $orders->links() }}
    </div>
</div>
@endsection