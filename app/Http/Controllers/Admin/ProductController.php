<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('categoryRelation')->get(); // ✅ Nạp danh mục của sản phẩm
        return view('admin.products.index', compact('products'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $data['image'] = 'uploads/' . $filename;
        }

        Product::create($data);
        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được thêm!');
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id); // Tìm sản phẩm theo ID

        return view('admin.products.edit', compact('product')); // Trả về view edit
    }
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Kiểm tra dữ liệu đầu vào
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'category_id' => 'nullable|integer',
            'price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'short_desc' => 'nullable|string',
            'long_desc' => 'nullable|string',
            'img' => 'nullable|string',
        ]);

        // Cập nhật dữ liệu
        $product->update([
            'name' => $request->name,
            'brand' => $request->brand,
            'type' => $request->type,
            'category' => $request->category,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'img' => $request->img,
        ]);

        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được cập nhật.');
    }
}
