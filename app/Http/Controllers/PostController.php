<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function show($id)
    {
        // Tìm bài viết theo ID
        $post = Post::find($id);
       
        // Nếu bài viết không tồn tại, trả về lỗi 404
        if (!$post) {
            abort(404);
        }

        // Trả về view chi tiết bài viết
        return view('news.show', compact('post'));
    }
}
