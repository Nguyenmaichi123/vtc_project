@vite('resources/scss/Product.scss')
@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <h1 class="text-center fs-4 fw-bold">DANH MỤC SẢN PHẨM</h1>
    
    <div class="row mt-5">
        @foreach($categories as $category)
        <div class="col-md-4">
            <a href="{{ route('category.show', $category->id) }}">
                <img src="{{ asset('storage/' . $category->image) }}" class="category-img" alt="{{ $category->name }}">
            </a>
            <h3 class="text-center mt-3">{{ $category->name }}</h3>
        </div>
        @endforeach
    </div>

    {{-- SẢN PHẨM KHUYẾN MẠI --}}
    <hr class="mt-5">
    <h2 class="text-center fs-4 fw-bold m-5">SẢN PHẨM KHUYẾN MẠI</h2>
    
    <div class="row">
        @foreach($discountedProducts as $product)
        <div class="col-md-3">
            <div class="card border-0">
                <a href="{{ route('product.show', $product->id) }}">
                    <img src="{{ Storage::url($product->img) }}" class="card-img-top" alt="{{ $product->name }}">
                </a>
                <div class="card-body text-center">
                    <p class="card-text">{{ $product->name }}</p>
                    <h5 class="text-danger">{{ $product->discount_price }}$ <del class="text-muted">{{ $product->original_price }}$</del></h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- SẢN PHẨM NỔI BẬT --}}
    <hr class="mt-5">
    <h2 class="text-center fs-4 fw-bold m-5">SẢN PHẨM NỔI BẬT</h2>

    <div class="row">
        <div class="col-md-6">
            <h3 class="text-center">Áo Khoác</h3>
            <div class="row">
                @foreach($jackets as $jacket)
                <div class="col-md-6">
                    <div class="card border-0">
                        <a href="{{ route('product.show', $jacket->id) }}">
                            <img src="{{ Storage::url($jacket->img) }}" class="card-img-top" alt="{{ $jacket->name }}">
                        </a>
                        <div class="card-body text-center">
                            <p class="card-text">{{ $jacket->name }}</p>
                            <h5 class="font-weight-bold">{{ $jacket->price }}$</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="col-md-6">
            <h3 class="text-center">Áo Sơ Mi</h3>
            <div class="row">
                @foreach($shirts as $shirt)
                <div class="col-md-6">
                    <div class="card border-0">
                        <a href="{{ route('product.show', $shirt->id) }}">
                            <img src="{{ Storage::url($shirt->img) }}" class="card-img-top" alt="{{ $shirt->name }}">
                        </a>
                        <div class="card-body text-center">
                            <p class="card-text">{{ $shirt->name }}</p>
                            <h5 class="font-weight-bold">{{ $shirt->price }}$</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- SẢN PHẨM MỚI --}}
    <hr class="mt-5">
    <h2 class="text-center fs-4 fw-bold m-5">SẢN PHẨM MỚI</h2>
    
    <div class="row">
        @foreach($newProducts as $product)
        <div class="col-md-3">
            <div class="card border-0">
                <a href="{{ route('product.show', $product->id) }}">
                    <img src="{{ Storage::url($product->img) }}" class="card-img-top" alt="{{ $product->name }}">
                </a>
                <div class="card-body text-center">
                    <p class="card-text">{{ $product->name }}</p>
                    <h5 class="font-weight-bold">{{ $product->price }}$</h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="text-center mt-5">
        <a href="{{ route('product.all') }}" class="btn-xem-them">XEM THÊM</a>
    </div>
</div>


@endsection





