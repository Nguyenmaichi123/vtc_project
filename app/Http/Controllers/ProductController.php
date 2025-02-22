<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller {
    public function index() {
        $products = Product::paginate(8);
        $brands = Product::distinct()->pluck('brand');
        $types = Product::distinct()->pluck('type');



        return view('products.index', compact('products','brands','types'));
    }
    // khuyen mai
    public function onSale() {
        $products = Product::where('category', 'on_sale')->paginate(8);

        return view('products.onSale', compact('products'));

        $brands = Product::distinct()->pluck('brand');
        $types = Product::distinct()->pluck('type');
        return view('products.onSale', compact('products','brands','types'));

    }
    // noi bat
    public function bestSelling() {
        $products = Product::where('category', 'best_selling')->paginate(8);


        return view('products.bestSelling', compact('products'));

        $brands = Product::distinct()->pluck('brand');
        $types = Product::distinct()->pluck('type');
        return view('products.bestSelling', compact('products','brands','types'));

    }
    // moi
    public function new() {
        $products = Product::where('category', 'new')->paginate(8);


        return view('products.new', compact('products'));

        $brands = Product::distinct()->pluck('brand');
        $types = Product::distinct()->pluck('type');
        return view('products.new', compact('products','brands','types'));

    }

    public function search(Request $request) {
        $searchTerm = '%' . $request->input('search') . '%';
        $products = Product::where('name', 'LIKE', $searchTerm)->paginate(8);

        $message = $products->isEmpty() ? 'Không có sản phẩm nào tìm thấy.' : null;

         $brands = Product::distinct()->pluck('brand');
         $types = Product::distinct()->pluck('type');
        return view('products.index', compact('products', 'message','brands','types'));
        
        // if ($products->isEmpty()) {
        //     return view('products.index', [
        //         'message' => 'Không có sản phẩm nào tìm thấy.',
        //     ]);
        // }
        
        // return view('products.index', compact('products'));

        $brands = Product::distinct()->pluck('brand');
        $types = Product::distinct()->pluck('type');

        return view('products.index', compact('products', 'message','brands','types'));

    }

    public function filterByBrand($brand) {
        $products = Product::where('brand', $brand)->paginate(8);
        $brands = Product::distinct()->pluck('brand');

         $types = Product::distinct()->pluck('type');

        $types = Product::distinct()->pluck('type');


        return view('products.index', compact('products','brands','types'));
    }
   
    public function filterByType($type) {
        $products = Product::where('type', $type)->paginate(8);
        $types = Product::distinct()->pluck('type');
        $brands = Product::distinct()->pluck('brand');



        return view('products.index', compact('products', 'types','brands'));
    }

    public function showDetail($id) {
        $products = Product::where('id', $id)->get();
    
        return view('products.ProductDetail', compact('products'));
    }



    //session
    public function addToSession(Request $request)
    {
        $productId = $request->input('product_id');

        // Lấy danh sách sản phẩm từ session hoặc tạo mảng mới nếu chưa có
        $products = session()->get('cart', []);

        // Thêm ID sản phẩm vào session (nếu chưa có)
        if (!in_array($productId, $products)) {
            $products[] = $productId;
        }

        // Lưu lại session
        session()->put('cart', $products);

        return response()->json(['success' => true, 'cart' => $products]);
        
    }

    public function Showcart()
    {
        $productIds = session('cart');

        // Lấy tất cả các sản phẩm có id trong mảng
        $products = Product::whereIn('id', $productIds)->get();
        session()->forget('cart');
        return view('products.productscard', compact('products'));
        
    }

}

?>