@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ Storage::url($product->img) }}" class="img-fluid" alt="{{ $product->name }}">
        </div>
        <div class="col-md-6">
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->description }}</p>
            <h4 class="text-danger">{{ $product->price }}$</h4>
            <a href="{{ route('product.index') }}" class="btn btn-primary">Quay lại</a>
        </div>
    </div>
</div>

@endsection

