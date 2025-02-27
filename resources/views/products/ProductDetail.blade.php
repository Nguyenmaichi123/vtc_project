@vite('resources/scss/Home.scss')
@extends('layouts.app')
@section('content')
@foreach ($products as $product)
<div class="container">
    <nav class="breadcrumb">
        <a class="me-2" href="{{ route('home.index') }}">Trang chủ</a> > 
        <a class="me-2 ms-2" href="{{ route('products.index') }}">Sản phẩm</a> > 
        <span class="ms-2 text-dark">{{ $product->name }}</span>
    </nav>
    <div class="product row">
        <div class="product-image p-0 m-0 col-xs-12 col-md-5">
            <img src="{{ asset('product/' . $product->img) }}" alt="{{ $product->name }}">
        </div>
        <div class="product-details p-0 m-0 col-xs-12 col-md-5">
            <h1>{{ $product->name }}</h1>
            <p>Hãng: <strong>{{ $product->brand }}</strong></p>
            <p>{{ $product->short_desc }}</p>
            <p class="price">
                @if ($product->sale_price > 0)
                    <span class="current-price">{{ $product->sale_price }}$</span>
                    <span class="original-price">{{ $product->price }}$</span>
                @else
                    <span class="original-price no-strike">{{ $product->price }}$</span>
                @endif
            </p>
            <div class="quantity">
                <label for="quantity">Số lượng:</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1">
            </div>
            <button class="add-to-cart"data-id={{ $product->id }}>THÊM VÀO GIỎ HÀNG</button>
        </div>
    </div>
    <div class="body">
        <div class="tabs py-5">
            <button class="tab isActiveDesc p-3 border bg-dark text-light" data-tab="tab1">Mô Tả</button>
            <button class="tab isActiveSize p-3 border bg-dark text-light" data-tab="tab2">Bảng Kích Thước</button>
            <hr>
        </div>
        <div class="tab-content" id="tab1">
            <p>{{ $product->long_desc }}</p>
        </div>
        <div class="tab-content" id="tab2">
            <img src="{{ asset('product/' . 'customSizeChartContent.jpg') }}" alt="custom size">
        </div>
    </div>
</div>
@endforeach

<style>
body {
  font-family: Arial, sans-serif;   
  margin: 0;
  padding: 0;
}

.container {
  width: 90%;
  max-width: 1200px;
  margin: 20px auto;
}

.breadcrumb a {
  color: #bbb;
  text-decoration: none;
  font-size: 14px;
}

.breadcrumb span {
  color: #fff;
}

.product {
  display: flex;
  gap: 20px;
  margin-top: 20px;
}

.product-image img {
  width: 100%;
  max-width: 400px;
  border-radius: 10px;
}

.product-details {
  max-width: 600px;
}

.product-details h1 {
  font-size: 24px;
  margin-bottom: 10px;
}

.price {
  margin: 20px 0;
}

.current-price {
  font-size: 22px;
  color: #ffcc00;
  font-weight: bold;
}

.original-price {
  font-size: 18px;
  color: #999;
  text-decoration: line-through;
  margin-left: 10px;
}

.quantity {
  margin-bottom: 20px;
}

.quantity label {
  font-size: 16px;
}

.quantity input {
  width: 50px;
  padding: 5px;
  font-size: 16px;
  margin-left: 10px;
}

.add-to-cart {
  background-color: #333;
  color: #fff;
  padding: 10px 20px;
  font-size: 18px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
}

.add-to-cart:hover {
  background-color: #444;
}

.no-strike {
  text-decoration: none;
}

.active {
    font-size: 20px;
    font-weight: bold;
    background: #fff;
    display: inline-block;
}

.tab-content {
  display: none;
}
.tab-content.active {
  display: block;
}

.tab-content p {
    font-weight: normal;
    font-size: 15px;
    line-height: 2;
}

</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll(".tab");
    const contents = document.querySelectorAll(".tab-content");

    buttons.forEach(button => {
      button.addEventListener("click", function () {
        buttons.forEach(btn => btn.classList.remove("active"));
        contents.forEach(content => content.classList.remove("active"));
        button.classList.add("active");
        const targetTab = button.getAttribute("data-tab");
        document.getElementById(targetTab).classList.add("active");
      });
    });
});
</script>

@endsection