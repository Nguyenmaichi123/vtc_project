@vite('resources/scss/Home.scss')
@extends('layouts.app')

@section('content')

<div class="container mt-5">
    
    <img src="{{ asset('storage/slider_1.png') }}" alt="" width="100%">
   <hr class="mt-5">
    <div class="row mt-5 hero g-5">
        <div class="col-md-4 ">
            <a href=""><img src="{{ asset('storage/banner_1.png') }}" alt=""></a>
        </div>
        <div class="col-md-4 ">
            <a href=""><img src="{{ asset('storage/banner_2.png') }}" alt=""></a>
        </div>
        <div class="col-md-4 ">
            <a href=""><img src="{{ asset('storage/banner_3.png') }}" alt=""></a>
        </div>
    </div>
    <div class="row mt-5 ">
        <div class="col-md-3 col-3">
            <img src="{{ asset('storage/brand_1.png') }}" alt="">
        </div>
        <div class="col-md-3 col-3">
            <img src="{{ asset('storage/brand_2.png') }}" alt="">
        </div>
        <div class="col-md-3 col-3">
            <img src="{{ asset('storage/brand_3.png') }}" alt="">
        </div>
        <div class="col-md-3 col-3">
            <img src="{{ asset('storage/brand_4.png') }}" alt="">
        </div>
    </div>
</div>
<hr>
<h1 class="text-center fs-4 fw-bold m-5">SẢN PHẨM</h1>
<div class="container">
    <div class="row">
        @foreach($products1 as $product)
        <div class="col-md-3">
            <div class="card border-0">
               <a href=""><img src="{{ Storage::url($product->img) }}" class="card-img-top" alt="Quần jean mãi Only"></a>
                <div class="card-body text-center">
                    <p class="card-text">{{$product->name}}</p>
                    <h5 class="font-weight-bold">{{$product->price}}$</h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    <div class="row">
        @foreach($products2 as $product)
        <div class="col-md-3">
            <div class="card border-0">
             <a href=""><img src="{{ Storage::url($product->img) }}" class="card-img-top" alt="Quần jean mãi Only"></a>
                <div class="card-body text-center">
                    <p class="card-text">{{$product->name}}</p>
                    <h5 class="font-weight-bold">{{$product->price}}$</h5>
                </div>
            </div>
        </div>
        @endforeach
        <a href="" class="text-center"><button class="btn-xem-them">XEM THÊM</button></a>
    </div>
    
    <div class="row">
        <div class="col-md-6">
    <div class="banner-container mt-5">
        <img src="{{ asset('storage/twobanner_1.png') }}" class="banner-image" alt="Handmade Image">
        <div class="banner-content">
            <h2>HANDMADE</h2>
            <hr style="width: 60px; border: 1px solid white; margin: 10px auto;">
            <p>Sản phẩm làm thủ công bởi những người thợ tài ba</p>
            <a href="#" class="btn-banner">XEM THÊM</a>
        </div>
    </div>          
</div>
<div class="col-md-6">
    <div class="banner-container mt-5">
        <img src="{{ asset('storage/twobanner_2.png') }}" class="banner-image" alt="Handmade Image">
        <div class="banner-content">
            <h2>Bộ sưu tập mới</h2>
            <hr style="width: 60px; border: 1px solid white; margin: 10px auto;">
            <p>Những mẫu mới nhất được cập nhật tại cửa hàng</p>
            <a href="#" class="btn-banner">XEM THÊM</a>
        </div>
    </div>          
</div>
</div>
<div class="about-content text-center mt-5">
    <p class="fs-5">VỀ CHÚNG TÔI</p>
    <p class="about-p-2">Gentleman sẽ mang lại cho khách hàng những trải nghiệm mua sắm thời trang hàng hiệu trực tuyến thú vị từ các thương hiệu thời trang quốc tế và trong nước, cam kết chất lượng phục vụ hàng đầu cùng với những bộ sưu tập quần áo nam nữ khổng lồ từ giày dép, trang phục, phụ kiện đến mỹ phẩm cho cả phụ nữ và nam giới với những xu hướng thời trang mới nhất. Bạn có thể tìm thấy những bộ trang phục mình muốn từ những bộ đồ ở nhà thật thoải mái hay tự tin trong những bộ trang phục công sở phù hợp. Những trải nghiệm mới chỉ có ở trang mua sắm hàng hiệu trực tuyến Gentleman.</p>
</div>

</div>
@endsection