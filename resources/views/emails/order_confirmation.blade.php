<!DOCTYPE html>
<html>
<head>
    <title>Xác nhận đơn hàng</title>
</head>
<body>
    <h2>Chào {{ $order->name }},</h2>
    <p>Cảm ơn bạn đã đặt hàng tại cửa hàng của chúng tôi. Dưới đây là thông tin đơn hàng của bạn:</p>

    <h3>Thông tin khách hàng:</h3>
    <p><strong>Email:</strong> {{ $order->email }}</p>
    <p><strong>Điện thoại:</strong> {{ $order->phone }}</p>
    <p><strong>Địa chỉ:</strong> {{ $order->address }}, {{ $order->city }}</p>
    <p><strong>Phương thức thanh toán:</strong> {{ $order->payment_method }}</p>

    <h3>Chi tiết đơn hàng:</h3>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
        </tr>
        @foreach ($products as $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>{{ number_format($item['price'], 2) }}$</td>
            </tr>
        @endforeach
    </table>

    <h3>Tổng cộng: {{ number_format($order->total_price, 2) }}$</h3>

    <p>Cảm ơn bạn đã mua hàng!</p>
    <p>Trân trọng, <br> <strong>Gentleman Store</strong></p>
</body>
</html>
