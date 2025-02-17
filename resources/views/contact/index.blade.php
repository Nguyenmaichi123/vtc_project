@vite('resources/scss/news.scss')
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="head d-flex ">
        <a href="{{ url('/') }}" class="me-1 text-decoration-none text-dark">Trang chủ ></a>
        <span class="fw-bold">Liên Hệ </span>
    </div>
    <hr>
    <div class="container mt-5">
        <h1 class="fw-bold text-uppercase font-monospace">Liên Hệ </h1>

        @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
        @endif

        <div class="row">
            <!-- Bản đồ -->
            <div class="col-12 mb-4">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14895.615124926451!2d105.80557795419794!3d21.036535617511124!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab2bddedd8ff%3A0xde7c4fb8e272fabc!2zQ8O0bmcgdHkgQVZBIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1739746736418!5m2!1svi!2s"
                    width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>
            </div>

            <!-- Form và thông tin liên hệ -->
            <div class="col-md-7">
                <h4>ĐỂ LẠI NHẮN</h4>
                <br>
                <form action="{{ url('/contact') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Họ và tên:</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                        @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Địa chỉ email:</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                        @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Số điện thoại:</label>
                        <input type="text" id="phone" name="phone" class="form-control" required>
                        @error('phone') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Lời nhắn:</label>
                        <textarea id="message" name="message" class="form-control" rows="4" required></textarea>
                        @error('message') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Gửi</button>
                </form>
            </div>

            <div class="col-md-5">
                <h4>Hãy liên hệ với chúng tôi!</h4>
                <br>
                <p><i class="fas fa-map-marker-alt"></i> Tầng 6 - Tòa nhà Ladeco - 266 Đội Cấn, Hà Nội</p>
                <p><i class="fas fa-phone"></i> 1900 6750</p>
                <p><i class="fas fa-envelope"></i> support@sapo.vn</p>
            </div>
        </div>
    </div>
</div>

@endsection