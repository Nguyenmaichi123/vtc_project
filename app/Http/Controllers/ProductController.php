<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller {
    public function index() {
        $products = Product::paginate(8);
        
        return view('products.index', compact('products'));
    }
    // khuyen mai
    public function onSale() {
        $products = Product::where('category', 'on_sale')->paginate(8);

        return view('products.onSale', compact('products'));
    }
    // noi bat
    public function bestSelling() {
        $products = Product::where('category', 'best_selling')->paginate(8);

        return view('products.bestSelling', compact('products'));
    }
    // moi
    public function new() {
        $products = Product::where('category', 'new')->paginate(8);

        return view('products.new', compact('products'));
    }

    public function search(Request $request) {
        $searchTerm = '%' . $request->input('search') . '%';
        $products = Product::where('name', 'LIKE', $searchTerm)->paginate(8);

        $message = $products->isEmpty() ? 'Không có sản phẩm nào tìm thấy.' : null;

        return view('products.index', compact('products', 'message'));
        
        // if ($products->isEmpty()) {
        //     return view('products.index', [
        //         'message' => 'Không có sản phẩm nào tìm thấy.',
        //     ]);
        // }
        
        // return view('products.index', compact('products'));
    }

    public function filterByBrand($brand) {
        $products = Product::where('brand', $brand)->get();
        $brands = Product::distinct()->pluck('brand')->toArray();

        return view('products.index', compact('products', 'brands'));
    }

    public function filterByType($type) {
        $products = Product::where('type', $type)->get();
        $types = Product::distinct()->pluck('type')->toArray();

        return view('products.index', compact('products', 'types'));
    }
}

?>