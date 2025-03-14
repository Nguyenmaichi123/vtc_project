@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h1>Thêm sản phẩm mới</h1>

    {{-- Hiển thị thông báo lỗi --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Tên sản phẩm</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        {{-- Chọn thương hiệu --}}
        <div class="mb-3">
            <label class="form-label">Thương hiệu</label>
            <select name="brand" class="form-control" required>
                <option value="">-- Chọn thương hiệu --</option>
                @foreach ($products->unique('brand') as $product)
                <option value="{{ $product->brand }}" {{ old('brand') == $product->brand ? 'selected' : '' }}>
                    {{ $product->brand }}
                </option>
                @endforeach
            </select>
        </div>

        {{-- Chọn danh mục sản phẩm --}}
        <div class="mb-3">
            <label class="form-label">Danh mục</label>
            <select name="category" class="form-control" required>
                <option value="">-- Chọn danh mục --</option>
                @foreach ($products->unique('category') as $category)
                <option value="{{ $category->category }}" {{ old('category') == $category->category ? 'selected' : '' }}>
                    {{ $category->category }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="form-label">Mã danh mục (nếu có):</label>
            <input type="number" name="category_id" class="form-control" value="{{ old('category_id') }}">
        </div>


        {{-- Giá bán và Giá khuyến mãi --}}
        <div class="mb-3">
            <label class="form-label">Giá bán</label>
            <input type="number" name="price" class="form-control" value="{{ old('price') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Giá khuyến mãi (nếu có)</label>
            <input type="number" name="sale_price" class="form-control" value="{{ old('sale_price') }}">
        </div>

        {{-- Loại sản phẩm --}}
        <div class="mb-3">
            <label class="form-label">Loại sản phẩm</label>
            <select name="type" class="form-control" required>
                <option value="">-- Chọn danh mục --</option>
                @foreach ($products->unique('type') as $category)
                <option value="{{ $category->type }}" {{ old('type') == $category->type ? 'selected' : '' }}>
                    {{ $category->type }}
                </option>
                @endforeach
            </select>
        </div>

        {{-- Số lượng sản phẩm --}}
        <div class="mb-3">
            <label class="form-label">Số lượng</label>
            <input type="number" name="quantity" class="form-control" value="{{ old('quantity') }}" required>
        </div>

        {{-- Mô tả ngắn --}}
        <div class="mb-3">
            <label class="form-label">Mô tả ngắn</label>
            <textarea name="short_desc" class="form-control">{{ old('short_desc') }}</textarea>
        </div>

        {{-- Mô tả chi tiết --}}
        <div class="mb-3">
            <label class="form-label">Mô tả chi tiết</label>
            <textarea name="long_desc" class="form-control">{{ old('long_desc') }}</textarea>
        </div>

        {{-- Upload hình ảnh --}}
        <div class="mb-3">
            <label class="form-label">Ảnh sản phẩm</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Lưu sản phẩm</button>
    </form>
</div>

@endsection