<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News; // Import model News

class NewsController extends Controller
{
    // public function index()
    // {
    //     $news = News::orderBy('created_at', 'desc')->get(); // Lấy tất cả bài viết, sắp xếp mới nhất
    //     return view('news.index', compact('news')); // Truyền dữ liệu sang view
    // }

    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->get();

        if ($news->isEmpty()) {
            return view('news.index', ['news' => collect()]); // Trả về Collection rỗng
        }

        return view('news.index',
            compact('news')
        );
    }


    // public function show($slug)
    // {
    //     $news = News::orderBy('created_at', 'desc')->get();
        
    //     return view('news.show1', compact('news'));
    // }
    public function show($slug)
    {
        $new = News::where('slug', $slug)->first(); // Lấy bài viết theo slug
        if (!$new) {
            abort(404); // Trả về lỗi 404 nếu không tìm thấy
        }
        $news = News::orderBy('created_at', 'desc')->get();
        return view('news.show1', compact('new','news'));
    }


    // public function show1($id)
    // {
    //     $news = News::latest()->take(5)->get(); // 5 bài mới nhất
    //     $article = News::findOrFail($id); // Lấy bài viết theo ID

    //     return view('news.show1', compact('article', 'news'));
    // }

    // public function show2($id)
    // {
    //     $news = News::latest()->take(5)->get(); // 5 bài mới nhất
    //     $article = News::findOrFail($id); // Lấy bài viết theo ID

    //     return view('news.show2', compact('article', 'news'));
    // }
}
