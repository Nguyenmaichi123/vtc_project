<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gentleman - Đặt hàng thành công</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .order-box {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            background: white;
        }
        .total-price {
            font-size: 20px;
            font-weight: bold;
            color: #007bff;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-primary">Gentleman</h2>
    <div class="alert alert-success">
        <strong>Cảm ơn bạn đã đặt hàng</strong><br>
        Một email xác nhận đã được gửi tới <strong>{{$email}}</strong>.<br>
        Xin vui lòng kiểm tra email của bạn.
    </div>

    <div class="row">
        <div class="col-md-7">
            <div class="order-box">
                <h5>Thông tin mua hàng</h5>
                <p><strong>Họ tên:</strong> {{$name}}</p>
                <p><strong>Email:</strong>{{$email}}</p>
                <p><strong>Điện thoại:</strong> {{$phone}}</p>

                <h5>Địa chỉ nhận hàng</h5>
                <p><strong>Người nhận:</strong> {{$name}}</p>
                <p><strong>Địa chỉ:</strong> {{$address}}</p>
                <p><strong>Thành phố:</strong>{{$city}}</p>
                <p><strong>Điện thoại:</strong> {{$phone}}</p>

                <h5>Phương thức thanh toán</h5>
                <p>{{$payment_method}}</p>

                <h5>Phương thức vận chuyển</h5>
                <p>Giao hàng tận nơi</p>
            </div>
        </div>

        <div class="col-md-5">
            <div class="order-box">
                <h5>Đơn hàng</h5>
                @foreach($products as $item)
                <div class="d-flex align-items-center mb-3 position-relative p-3">
                    <img src="{{ asset('product/'.$item['img']) }}" alt="Product Image" class="me-3" width="80">
                    <p class="mb-0">{{$item['name']}}</p>
                    <span class="ms-auto">{{$item['price']}}$</span>
                    <span  class="badge bg-danger position-absolute top-0 start-100 translate-middle rounded-pill">
                        {{ $item['quantity'] }}
                    </span>
                </div>
                <hr>
               @endforeach
               
                <p><strong>Tạm tính: </strong>{{$total}}$</p>
                
                <p class="total-price">Tổng cộng: {{$total}}$</p>
            </div>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="/" class="btn btn-primary">Tiếp tục mua hàng</a>
        <button onclick="window.print()" class="btn btn-outline-secondary ms-2">In</button>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
