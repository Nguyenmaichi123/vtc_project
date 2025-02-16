<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News; // Import model News

class NewsController extends Controller
{
   

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


    
    public function show($slug)
    {
        $new = News::where('slug', $slug)->first(); // Lấy bài viết theo slug
        if (!$new) {
            abort(404); // Trả về lỗi 404 nếu không tìm thấy
        }
        $news = News::orderBy('created_at', 'desc')->get();
        return view('news.show1', compact('new','news'));
    }


    
}
