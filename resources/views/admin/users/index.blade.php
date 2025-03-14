@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h1 class="mb-4">Quản lý Khách hàng</h1>
    <form method="GET" action="{{ route('admin.customers.index') }}">
        <input type="text" name="search" placeholder="Tìm kiếm tên/email..." value="{{ request('search') }}">
        <button type="submit">Tìm</button>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Ngày tạo</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->created_at->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('admin.customers.show', $customer->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Xem</a>

                    <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('admin.users.deleted' )}}" class="btn btn-warning">Xem tài khoản bị vô hiệu hóa</a>
    <div class="d-flex justify-content-center">
        {{ $users->links() }}
    </div>

</div>
@endsection