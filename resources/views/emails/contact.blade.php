@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Liên Hệ Chúng Tôi</h1>

    <!-- Hiển thị thông báo khi gửi mail thành công -->
    @if(session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ url('/contact') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Họ và tên:</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại:</label>
                            <input type="text" id="phone" name="phone" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">Tin nhắn:</label>
                            <textarea id="message" name="message" class="form-control" rows="4" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Gửi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection