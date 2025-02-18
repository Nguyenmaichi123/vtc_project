<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', [
    HomeController::class,
    'home'
]);

Route::get('/gioithieu', function () {
    return view('intro.index');
});

Route::get('/tin-tuc', [NewsController::class, 'index'])->name('tin-tuc');
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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        if (Auth::user()->role != 'admin') {
            abort(403);
        }
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/', function () {
        if (Auth::user()->role != 'customer') {
            abort(403);
        }
        return view('home.index');  // Chú ý đường dẫn đúng với file Blade
    })->name('home');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
