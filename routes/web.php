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









/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,'home'])->name('home.index');


Route::get('/gioithieu', function () {
    return view('intro.index');
});


 

Route::get('/tin-tuc/{slug}', [NewsController::class, 'show'])->name('news.show1');


Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/on-sale-product', [ProductController::class, 'onSale'])->name('products.onSale');
Route::get('/best-selling-product', [ProductController::class, 'bestSelling'])->name('products.bestSelling');
Route::get('/new-product', [ProductController::class, 'new'])->name('products.new');

Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/products/brand/{brand}', [ProductController::class, 'filterByBrand'])->name('products.filterByBrand');
Route::get('/products/type/{type}', [ProductController::class, 'filterByType'])->name('products.filterByType');

Route::get('/product-detail/{id}', [ProductController::class, 'showDetail'])->name('products.detail');


Route::get('/tin-tuc', [NewsController::class,'index'])->name('tintuc');

Route::get('/lien-he', function () {
    return view('contact.index');
})->name('lienhe');

// Tìm kiếm
Route::get('/search', function (Request $request) {
    $query = $request->get('q');
    $results = \App\Models\News::where('title', 'like', "%{$query}%")
        ->orWhere('content', 'like', "%{$query}%")
        ->get();
    return view('search-results', compact('results', 'query'));
})->name('search');

// Route mail contact
Route::post('/contact2', [ContactController::class, 'store'])->name('contact.store');

// Dashboard (chỉ cho user đã xác minh email)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile (chỉ user đã đăng nhập)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Xác thực Laravel
Auth::routes();

// Phân quyền Admin / Customer
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

// Điều hướng `/home` về trang chủ
Route::get('/home', function () {
    return redirect('/');
})->name('home');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/on-sale-product', [ProductController::class, 'onSale'])->name('products.onSale');
Route::get('/best-selling-product', [ProductController::class, 'bestSelling'])->name('products.bestSelling');
Route::get('/new-product', [ProductController::class, 'new'])->name('products.new');

Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/products/brand/{brand}', [ProductController::class, 'filterByBrand'])->name('products.filterByBrand');
Route::get('/products/type/{type}', [ProductController::class, 'filterByType'])->name('products.filterByType');

Route::get('/product-detail/{id}', [ProductController::class, 'showDetail'])->name('products.detail');


// route mail contact
Route::post('/contact2', [ContactController::class, 'store'])->name('contact.store');


//session
Route::post('/add-to-session', [ProductController::class, 'addToSession'])->name('add.to.session');



//cart
Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
Route::put('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/get', [CartController::class, 'getCart'])->name('cart.get');


//checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');
