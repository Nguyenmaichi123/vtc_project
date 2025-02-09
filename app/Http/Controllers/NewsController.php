<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use App\Models\Post;

class NewsController extends Controller
{
    // Hiển thị danh sách bài viết
    public function index()
    {
        // Lấy danh sách bài viết mới nhất
        $news = News::orderBy('created_at', 'desc')->take(6)->get();

        // Lấy các bài viết nổi bật (ví dụ: có nhiều lượt xem nhất)
        $featuredNews = News::orderBy('views', 'desc')->take(4)->get();

        // Truyền dữ liệu sang view
        return view('news.index', compact('news', 'featuredNews'));
    }

    // Hiển thị chi tiết bài viết
    public function show($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();
        // Lấy 5 bài viết mới nhất cho Sidebar (trừ bài viết hiện tại)
        $recentNews = News::where('slug', '!=', $slug)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        return view('news.show', compact('news', 'recentNews'));
    }

    public function fashionTrends()
    {
        return view('news.fashion-trends', [
            'title' => 'Xu hướng thời trang',
            'description' => 'Cập nhật những xu hướng thời trang mới nhất.',
            'posts' => Post::where('category', 'fashion')->get(),
        ]);
    }

    public function promotions()
    {
        return view('news.promotions', [
            'title' => 'Khuyến mãi & giảm giá',
            'description' => 'Tổng hợp các chương trình giảm giá, flash sale.',
            'posts' => Post::where('category', 'promotion')->get(),
        ]);
    }

    public function outfitTips()
    {
        return view('news.outfit-tips', [
            'title' => 'Phối đồ & mẹo mặc đẹp',
            'description' => 'Hướng dẫn phối đồ, chia sẻ kinh nghiệm mặc đẹp.',
            'posts' => Post::where('category', 'outfit')->get(),
        ]);
    }

    public function productReviews()
    {
        return view('news.product-reviews', [
            'title' => 'Review sản phẩm',
            'description' => 'Đánh giá chi tiết về các sản phẩm thời trang.',
            'posts' => Post::where('category', 'review')->get(),
        ]);
    }

    public function brandNews()
    {
        return view('news.brand-news', [
            'title' => 'Tin tức thương hiệu',
            'description' => 'Cập nhật thông tin về các thương hiệu, sự kiện thời trang.',
            'posts' => Post::where('category', 'brand')->get(),
        ]);
    }


}
