<?php
    
namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\Category;

use Illuminate\Http\Request;

class ProductController extends Controller {
    public function index() {
        $products = Products::all();
        return view('products.index', compact('products'));

        // $categories = Category::all(); // Lấy tất cả danh mục
        // $discountedProducts = Products::where('discount_price', '>', 0)->get(); // Sản phẩm giảm giá
        // $jackets = Products::where('category_id', 1)->get(); // Giả sử ID 1 là áo khoác
        // $shirts = Products::where('category_id', 2)->get(); // Giả sử ID 2 là áo sơ mi
        // $newProducts = Products::latest()->take(8)->get(); // 8 sản phẩm mới nhất

        // return view('product.index', compact('categories', 'discountedProducts', 'jackets', 'shirts', 'newProducts'));
    }

    public function show($id) {
        $product = Products::findOrFail($id);
        return view('product.show', compact('product'));
    }

    public function all() {
        $products = Products::all(); // Lấy tất cả sản phẩm
        return view('product.all', compact('products'));
    }

    public function onSale() {
        return view('product.onSale');
    }

    public function new() {
        return view('product.new');
    }
}

?>