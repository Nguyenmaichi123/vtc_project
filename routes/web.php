<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;

use App\Http\Controllers\NewsController;


use Illuminate\Http\Request;


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

 quanganh
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/on-sale-product', [ProductController::class, 'onSale'])->name('products.onSale');
Route::get('/best-selling-product', [ProductController::class, 'bestSelling'])->name('products.bestSelling');
Route::get('/new-product', [ProductController::class, 'new'])->name('products.new');

Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/products/brand/{brand}', [ProductController::class, 'filterByBrand'])->name('products.filterByBrand');
Route::get('/products/type/{type}', [ProductController::class, 'filterByType'])->name('products.filterByType');

Route::get('/product-detail/{id}', [ProductController::class, 'showDetail'])->name('products.detail');

Route::get('/tin-tuc', [NewsController::class,'index'])->name('tin-tuc');
Route::get('/lien-he', function () {
    return view('contact.index');
});

// Route::get('/tin-tuc', [NewsController::class, 'index'])->name('news.index');
Route::get('/tin-tuc/{slug}', [NewsController::class, 'show'])->name('news.show1');

// Route cho chức năng tìm kiếm (nếu bạn có xây dựng chức năng này)
Route::get('/search', function (Request $request) {
    // Xử lý tìm kiếm và trả về view tương ứng
    $query = $request->get('q');
    // Ví dụ: Tìm kiếm trong bảng tin tức
    $results = \App\Models\News::where('title', 'like', "%{$query}%")
        ->orWhere('content', 'like', "%{$query}%")
        ->get();
    return view('search-results', compact('results', 'query'));
})->name('search');

// Route::get('/tin-tuc/{id}', [NewsController::class, 'show'])->name('news.show1');
// Route::get('/tin-tuc/{id}', [NewsController::class, 'show2'])->name('news');


// route mail contact
Route::post('/contact2', [ContactController::class, 'store'])->name('contact.store');
 master
