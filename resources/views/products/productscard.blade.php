@extends('layouts.app')

@section('content')



<audio id="background-music" autoplay loop>
    <source src="{{ asset('product/nhac.mp3') }}" type="audio/mpeg">
</audio>



<div class="container">
   <button id="test3" class="fa fa-music fs-4 text-primary" style="cursor: pointer;"></button>
    <h4 class="mt-4">Giỏ hàng</h4>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Ảnh sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($products as $product)
                @php 
                    $subtotal = $product->price * $product->quantity;
                    $total += $subtotal;
                @endphp
                <tr>
                    <td>
                        <img src="{{ asset('product/' . $product->img) }}" alt="{{ $product->name }}" width="80">
                    </td>
                    <td>{{ $product->name }}</td>
                    <td><strong>{{ number_format($product->price, 0, ',', '.') }}$</strong></td>
                    <td>
                        <form action="{{ route('cart.update', $product->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="input-group" style="width: 120px;">
                                <button type="submit" name="decrease" value="1" class="btn btn-outline-secondary">-</button>
                                <span class="form-control text-center bg-light">{{ $product->quantity }}</span>
                                <button type="submit" name="increase" value="1" class="btn btn-outline-secondary">+</button>
                              
                            </div>
                        </form>
                    </td>
                    <td><strong>{{ number_format($subtotal, 0, ',', '.') }}$</strong></td>
                    <td>
                        <form action="{{ route('cart.remove', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link text-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" class="text-end"><strong>Tổng tiền:</strong></td>
                <td><strong>{{ number_format($total, 0, ',', '.') }}$</strong></td>
                <td></td>
            </tr>
        </tfoot>
    </table>
    <div class="d-flex justify-content-between">
        <a href="{{ route('home') }}" class="btn btn-outline-dark">Tiếp tục mua hàng</a>
        <a href="{{ route('checkout') }}" class="btn btn-dark">TIẾN HÀNH THANH TOÁN</a>
    </div>
</div>
@endsection


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
 $(document).on("click", "#test3", function() {
    var music = document.getElementById("background-music");
    var body = $("body");

    for (var i = 0; i < 5; i++) {
            body.animate({ marginLeft: "-10px" }, 50)
                .animate({ marginLeft: "10px" }, 50);
        }
        body.animate({ marginLeft: "0px" }, 50);
    
    if (music.paused) {
        music.play().then(() => {
            $(this).addClass("text-danger"); 
            console.log("Nhạc đang phát...");
        }).catch(error => {
            console.error("Trình duyệt chặn phát nhạc:", error);
        });
    } else {
        music.pause();
        $(this).removeClass("text-danger"); 
        console.log("Nhạc đã tắt.");
    }
});

    </script>
    
    
    