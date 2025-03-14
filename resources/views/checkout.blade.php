@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Form thông tin nhận hàng -->
        <div class="col-md-7">
            <h3 class="mb-3">Thông tin nhận hàng</h3>
            <form action="{{ route('checkout.placeOrder') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Họ và tên" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="phone" class="form-control" placeholder="Số điện thoại (tuỳ chọn)">
                </div>
                <div class="mb-3">
                    <input type="text" name="address" class="form-control" placeholder="Địa chỉ" required>
                </div>
                <div class="mb-3">
                    <select name="city" class="form-control" required>
                        <option value="">Chọn tỉnh thành</option>
                        <option value="Hà Nội">Hà Nội</option>
                        <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                        <option value="Đà Nẵng">Đà Nẵng</option>
                    </select>
                </div>

                <h4 class="mt-4">Thanh toán</h4>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment_method" value="COD" required>
                    <label class="form-check-label">Thanh toán khi nhận hàng (COD)</label>
                </div>

                <button type="submit" class="btn btn-primary mt-3 w-100">ĐẶT HÀNG</button>
            </form>
        </div>

        <!-- Đơn hàng -->
        <div class="col-md-5">
            <h3 class="mb-3">Đơn hàng ({{ count($products) }} sản phẩm)</h3>
            <ul class="list-group mb-3">
                @php $total = 0; @endphp
            @foreach($products as $product)
                @php 
                    $subtotal = $product->price * $product->quantity;
                    $total += $subtotal;
                @endphp
                <li class="list-group-item d-flex justify-content-between">
                    <div>
                        <img src="{{ asset('product/'.$product->img) }}" alt="" width="50">  
                         {{ $product->name }}
                        <span  class="badge bg-danger position-absolute top-0 start-100 translate-middle rounded-pill">
                            {{ $product->quantity }}
                        </span>
                    </div>
                    <span>{{ number_format($product->price * 1000, 0, ',', '.') }} VNĐ</span>
                </li>
                @endforeach
            </ul>

            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Nhập mã giảm giá">
                <button class="btn btn-secondary">Áp dụng</button>
            </div>

            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between">
                    <span>Tạm tính</span>
                    <strong>{{ number_format($total * 1000, 0, ',', '.') }} VNĐ</strong>
                </li>
                <li class="list-group-item d-flex justify-content-between bg-light">
                    <span>Phí vận chuyển</span>
                    <strong>-</strong>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span><strong>Tổng cộng</strong></span>
                    <strong>{{ number_format($total * 1000, 0, ',', '.') }} VNĐ</strong>
                </li>
            </ul>

            <a href="{{ route('cart.show') }}" class="text-decoration-none mt-3 d-block">← Quay về giỏ hàng</a>
        </div>
    </div>
</div>





@endsection



