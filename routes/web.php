<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Auth\PasswordController;


// ADMIN
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController; // ✅ Đổi alias để tránh trùng
use App\Http\Controllers\Admin\DashboardController;



// ===================== ROUTE CHO USER =====================
Route::get('/', [HomeController::class, 'home'])->name('home.index');





// Route cho trang giới thiệu
Route::get('/gioithieu', function () {
    return view('intro.index');
});

// Tin tức
Route::get('/tin-tuc/{slug}', [NewsController::class, 'show'])->name('news.show1');
Route::get('/tin-tuc', [NewsController::class, 'index'])->name('tintuc');

// Route sản phẩm dành cho USER
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/on-sale-product', [ProductController::class, 'onSale'])->name('products.onSale');
Route::get('/best-selling-product', [ProductController::class, 'bestSelling'])->name('products.bestSelling');
Route::get('/new-product', [ProductController::class, 'new'])->name('products.new');

Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/products/brand/{brand}', [ProductController::class, 'filterByBrand'])->name('products.filterByBrand');
Route::get('/products/type/{type}', [ProductController::class, 'filterByType'])->name('products.filterByType');
Route::get('/product-detail/{id}', [ProductController::class, 'showDetail'])->name('products.detail');

// Liên hệ
Route::get('/lien-he', function () {
    return view('contact.index');
})->name('lienhe');
Route::post('/contact2', [ContactController::class, 'store'])->name('contact.store');

// Tìm kiếm
Route::get('/search', function (Request $request) {
    $query = $request->get('q');
    $results = \App\Models\News::where('title', 'like', "%{$query}%")
        ->orWhere('content', 'like', "%{$query}%")
        ->get();
    return view('search-results', compact('results', 'query'));
})->name('search');

// Dashboard cho user đã xác minh email
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile dành cho user đã đăng nhập
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/edit-password', [PasswordController::class, 'edit'])->name('password.edit');
    Route::post('/profile/change-password', [PasswordController::class, 'change_update'])->name('password.update');
    Route::post('/profile/handle-password', [PasswordController::class, 'handlePasswordInput'])->name('password.handle');
});
// Xác thực Laravel
Auth::routes();

// Điều hướng `/home` về trang chủ
Route::get('/home', function () {
    return redirect('/');
})->name('home');

// Phân quyền ADMIN & CUSTOMER
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        if (Auth::user()->role != 'admin') {
            abort(403);
        }
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/customer', function () {
        if (Auth::user()->role != 'customer') {
            abort(403);
        }
        return view('customer.dashboard');
    })->name('customer.dashboard');
});

// Session Cart
Route::post('/add-to-session', [ProductController::class, 'addToSession'])->name('add.to.session');
Route::get('/product-cart', [ProductController::class, 'Showcart'])->name('products.showcart');

// Giỏ hàng
Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
Route::put('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/get', [CartController::class, 'getCart'])->name('cart.get');

// Thanh toán
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');
Route::get('/checkoutcomplete', [CheckoutController::class, 'checkoutcomplete'])->name('checkoutcomplete');

// ===================== ROUTE CHO ADMIN =====================
Route::prefix('admin-dashboard')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    // ✅ Sửa lại ProductController của ADMIN (tránh trùng với USER)
    Route::resource('products', AdminProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('users', UserController::class);
    Route::resource('orders', OrderController::class);
    //quan ly san pham
    Route::get('/admin/products/{id}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin/products/{id}', [AdminProductController::class, 'update'])->name('admin.products.update');
    //quan ly khach hang
    Route::get('/admin/users/show/{user}', [UserController::class, 'show'])->name('admin.customers.show');
    Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('admin.customers.edit');
    Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.customers.update');
    Route::delete('/admin/users/{user}/destroy', [UserController::class, 'destroy'])->name('admin.customers.destroy');
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.customers.index');
    Route::get('/admin/users/deleted', [UserController::class, 'indexDeleted'])->name('admin.users.deleted');
    Route::post('/admin/users/{id}/restore', [UserController::class, 'restore'])->name('admin.users.restore');


    //quan ly don hang

    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('admin.orders.show'); // Chi tiết đơn hàng
    Route::get('/orders/{id}/edit', [OrderController::class, 'edit'])->name('admin.orders.edit'); // Chỉnh sửa đơn hàng
    Route::put('/orders/{id}', [OrderController::class, 'update'])->name('admin.orders.update'); // Cập nhật đơn hàng
    Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('admin.orders.destroy'); // Xóa đơn hàng



});
