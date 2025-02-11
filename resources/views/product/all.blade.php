@extends('layouts.app')
@section('content')

<div class="container">
    <h2>Tất cả sản phẩm</h2>
    <div class="row">
        @foreach($products as $product)
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
</div>

@endsection

