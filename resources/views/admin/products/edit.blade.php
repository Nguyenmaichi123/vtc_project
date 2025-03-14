@extends('admin.layouts.master')
@vite('resources/scss/editproduct.scss')
@section('content')

<div class="product-edit-container">
    <h1>Chỉnh sửa sản phẩm</h1>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Tên sản phẩm:</label>
            <input type="text" name="name" value="{{ $product->name }}" required>
        </div>

        <div>
            <label for="brand">Thương hiệu:</label>
            <input type="text" name="brand" value="{{ $product->brand }}" required>
        </div>

        <div>
            <label for="type">Loại sản phẩm:</label>
            <input type="text" name="type" value="{{ $product->type }}" required>
        </div>

        <div>
            <label for="category">Danh mục:</label>
            <input type="text" name="category" value="{{ $product->category }}" required>
        </div>

        <div>
            <label for="category_id">Mã danh mục (nếu có):</label>
            <input type="number" name="category_id" value="{{ $product->category_id }}">
        </div>

        <div>
            <label for="price">Giá:</label>
            <input type="number" step="0.01" name="price" value="{{ $product->price }}" required>
        </div>

        <div>
            <label for="sale_price">Giá khuyến mãi:</label>
            <input type="number" step="0.01" name="sale_price" value="{{ $product->sale_price }}" required>
        </div>

        <div class="full-width">
            <label for="short_desc">Mô tả ngắn:</label>
            <textarea name="short_desc">{{ $product->short_desc }}</textarea>
        </div>

        <div class="full-width">
            <label for="long_desc">Mô tả chi tiết:</label>
            <textarea name="long_desc">{{ $product->long_desc }}</textarea>
        </div>

        <div class="full-width">
            <label for="img">Hình ảnh:</label>
            <input type="file" name="img" >
        </div>

        <button type="submit">Cập nhật</button>
    </form>
</div>
@endsection