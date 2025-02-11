<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;

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

Route::get('/',[
    HomeController::class,'home'
]);

Route::get('/gioithieu', function () {
    return view('intro.index');
});

Route::get('/tin-tuc', function () {
    return view('news.index');
});

Route::get('/tin-tuc', [NewsController::class, 'index'])->name('news.index');
Route::get('/tin-tuc/{slug}', [NewsController::class, 'show'])->name('news.show');
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


Route::get('/fashion-trends', [NewsController::class, 'fashionTrends'])->name('fashion-trends');
Route::get('/promotions', [NewsController::class, 'promotions'])->name('promotions');
Route::get('/outfit-tips', [NewsController::class, 'outfitTips'])->name('outfit-tips');
Route::get('/product-reviews', [NewsController::class, 'productReviews'])->name('product-reviews');
Route::get('/brand-news', [NewsController::class, 'brandNews'])->name('brand-news');

Route::get('/news/{id}', [PostController::class, 'show']);
Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');

Route::post('/tin-tuc', [NewsController::class, 'store'])->name('news.store');
Route::delete('/tin-tuc/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
Route::get('/lien-he', [ContactController::class, 'index']);
Route::post('/lien-he', [ContactController::class, 'store']);