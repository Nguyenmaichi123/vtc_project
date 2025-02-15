<div class="container">
    <!-- Tiêu đề trang -->
    <h2 class="text-center mb-3">{{ $pageTitle ?? 'Danh sách sản phẩm' }}</h2>

    <!-- Bộ lọc sản phẩm -->
    <div class="text-center mb-3">
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#filter-options">
            Chọn theo
        </button>
    </div>

    <div class="collapse" id="filter-options">
        <div class="card card-body">
            <div class="row">
                <div class="col-md-4">
                    <label class="form-label">Danh mục</label>
                    <select class="form-select">
                        <option>Áo</option>
                        <option>Quần</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Nhà sản xuất</label>
                    <select class="form-select">
                        <option>Asos</option>
                        <option>Bellfield</option>
                        <option>Brixton</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Loại sản phẩm</label>
                    <select class="form-select">
                        <option>Áo khoác</option>
                        <option>Áo sơ mi</option>
                        <option>Áo phông</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Danh sách sản phẩm -->
    <div class="row mt-4">
        @for ($i = 0; $i < 8; $i++)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Sản phẩm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Tên sản phẩm {{$i + 1}}</h5>
                        <p class="card-text text-danger">Giá: 1.000.000đ</p>
                    </div>
                </div>
            </div>
        @endfor
    </div>

</div>