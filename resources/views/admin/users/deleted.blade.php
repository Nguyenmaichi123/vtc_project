@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h1 class="mb-4">Danh sách tài khoản bị vô hiệu hóa</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Ngày vô hiệu hóa</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->deleted_at->format('d/m/Y') }}</td>
                <td>
                    <form action="{{ route('admin.users.restore', $user->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">Khôi phục</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $users->links() }}
    </div>

    <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary">Quay lại</a>
</div>
@endsection