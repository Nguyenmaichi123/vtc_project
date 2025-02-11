<?php
    
namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;

class ProductController extends Controller {
    public function index() {
        $categories = Category::all(); // Lấy tất cả danh mục
        $discountedProducts = Product::where('discount_price', '>', 0)->get(); // Sản phẩm giảm giá
        $jackets = Product::where('category_id', 1)->get(); // Giả sử ID 1 là áo khoác
        $shirts = Product::where('category_id', 2)->get(); // Giả sử ID 2 là áo sơ mi
        $newProducts = Product::latest()->take(8)->get(); // 8 sản phẩm mới nhất

        return view('product.index', compact('categories', 'discountedProducts', 'jackets', 'shirts', 'newProducts'));
    }

    public function show($id) {
        $product = Product::findOrFail($id);
        return view('product.show', compact('product'));
    }

    public function all() {
        $products = Product::all(); // Lấy tất cả sản phẩm
        return view('product.all', compact('products'));
    }

    public function onSale() {
        return view('product.onSale');
    }

    public function bestSelling($category = null) {
        if ($category) {
            // Lọc sản phẩm theo danh mục
            $products = Product::where('category', $category)->get();
        } else {
            // Hiển thị tất cả sản phẩm nổi bật
            $products = Product::whereIn('category', ['jackets', 'shirts'])->get();
        }

        return view('product.bestSelling', compact('category', 'products'));
    }

    public function new() {
        return view('product.new');
    }
}

?>