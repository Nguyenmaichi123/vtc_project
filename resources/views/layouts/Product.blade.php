<div class="container">
    <div class="row">
        <div class="col-md-6">
            <!-- Thanh tìm kiếm -->
            <form action="{{ route('products.search') }}" method="GET" class="d-flex my-4">
                <input type="text" name="search" placeholder="Tìm kiếm sản phẩm" class="form-control me-2" id="search-input" style="width: 300px;">
                <button type="submit" class="btn px-5 border bg-dark text-light">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>
    </div>
    
  
    <!-- Tiêu đề trang -->
    <h2 class="text-center mb-3">{{ $pageTitle ?? 'Danh sách sản phẩm' }}</h2>
    <!-- Bộ lọc sản phẩm -->
    <div class="text-center mb-3">
        <button class="btn px-5 border bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#filter-options">
            Chọn theo
        </button>
    </div>

    <div class="collapse" id="filter-options">
        <div class="card card-body">
            <div class="row">
                <div class="col-md-4">
                    <label class="form-label pe-3">Thương hiệu</label>
                    <select id="brand-select" class="p-2 border bg-dark text-light" onchange="filterByBrand()">
                        <option class="" value="">Chọn nhà sản xuất</option>
                        @if(isset($brands) && $brands->count() > 0)
                            @foreach ($brands as $brand)
                                <option value="{{ $brand }}">{{ $brand }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label pe-3">Loại sản phẩm</label>
                    <select id="type-select" class="p-2 border bg-dark text-light" onchange="filterByType()">
                        <option value="">Chọn loại sản phẩm</option>
                        @if(isset($types) && $types->count() > 0)
                            @foreach ($types as $type)
                            <option value="{{ $type }}">{{ $type }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>
    </div> 

    <!-- Danh sách sản phẩm --> 
    @if($products->count() > 0)
    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-3">
            <div class="product-card">
                @if($product->category === 'on_sale')
                <span class="sale-badge">SALE</span>
                @endif  
                <div class="product-image">
                     <a href="{{ route('products.detail', ['id' => $product->id]) }}">
                        <img src="{{ asset('product/' . $product->img) }}" alt="{{ $product->name }}">
                    </a>
                </div>
                <div class="product-name">{{ $product->name }}</div>
                <div>
                    @if($product->category === 'on_sale')
                    <span class="product-price">{{ number_format($product->sale_price, 2) }}$</span>
                    @endif

                    @if($product->category !== 'on_sale')
                    <span class="product-original-price" style="text-decoration: none;">{{ number_format($product->price, 2) }}$</span>
                    @else
                    <span class="product-original-price">{{ number_format($product->price, 2) }}$</span>
                    @endif
                </div>
                <!-- Thêm nút "Thêm vào giỏ hàng" -->
                <div class="mt-2">
                    <button class="btn btn-primary btn-block px-3 border bg-dark text-light">
                        <i class="bi bi-cart-plus"></i> Thêm vào giỏ hàng
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="alert alert-info">
        {{ $message ?? 'Không có sản phẩm nào được tìm thấy.' }}
    </div>
    @endif


    <!-- Phân trang -->
    <div class="d-flex justify-content-center mt-4">
        {{ $products->links() }}
    </div>
</div>

<style>
    /* Tuỳ chỉnh giao diện */
.product-card {
      color: #fff;
      text-align: center;
      padding: 15px;
      border-radius: 5px;
      position: relative;
    }

    .product-image img {
      width: 100%;
      border-radius: 5px;
    }

    .sale-badge {
      position: absolute;
      top: 10px;
      right: 10px;
      background-color: red;
      color: white;
      font-size: 12px;
      padding: 2px 5px;
      border-radius: 3px;
    }

    .product-name {
      font-weight: bold;
      margin: 10px 0 5px;
    }

    .product-price {
      color: red;
      font-weight: bold;
    }

    .product-original-price {
      text-decoration: line-through;
      color: #888;
      margin-left: 5px;
    }
</style>

<script>
function filterByBrand() {
    const brand = document.getElementById('brand-select').value;
    window.location.href = "{{ url('/products/brand') }}/" + encodeURIComponent(brand);
   
}

function filterByType() {
    const type = document.getElementById('type-select').value;
    window.location.href = `/products/type/${type}`;
    
}

function filterById() {
    const brand = document.getElementById('brand-select').value;
    window.location.href = "{{ url('/products/brand') }}/" + encodeURIComponent(brand);
   
}
</script>