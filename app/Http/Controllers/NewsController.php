<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\File;

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


    public function store(Request $request)
    {
        // Kiểm tra dữ liệu đầu vào
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Xử lý upload ảnh
        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            // Tạo tên file duy nhất
            $filename = time() . '_' . $file->getClientOriginalName();

            // Lưu file vào thư mục public/uploads/news
            $file->move(public_path('uploads/news'), $filename);

            // Lưu đường dẫn ảnh vào database
            $imagePath = 'uploads/news/' . $filename;
        }

        // Lưu bài viết vào database
        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath
        ]);

        return back()->with('success',
            'Bài viết đã được thêm!'
        );
    }

    public function destroy($id)
    {
        $news = News::find($id);

        // Kiểm tra xem bài viết có tồn tại không
        if (!$news) {
            return back()->with('error', 'Bài viết không tồn tại!');
        }

        // Xóa file vật lý nếu tồn tại
        // if ($news->image && File::exists(public_path($news->image))) {
        //     // Xóa file vật lý
        //     File::delete(public_path($news->image));
        // }

        // Xóa bản ghi trong database
        $news->delete();  // Sử dụng đối tượng để gọi phương thức delete() động

        return back()->with('success', 'Bài viết đã được xóa!');
    }



}
