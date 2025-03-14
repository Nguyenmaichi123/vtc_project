@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h1 class="mb-4">Quản lý sản phẩm</h1>
    <a href="{{ route('products.create') }}" class="btn btn-success mb-3"><i class="fa fa-plus"></i> Thêm sản phẩm</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Danh mục</th>
                <th>Giá bán</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category ?? 'Chưa phân loại' }}</td> <!-- ✅ Sửa lại -->
                <td>{{ number_format($product->price) }} VND</td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Sửa</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection

@section('scripts')
@endsection