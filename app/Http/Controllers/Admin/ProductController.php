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
        $products = Product::all();
        return view('admin.products.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'string|max:255',
            'long_desc' => 'nullable|string',
            'price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'category' => 'string|max:255',
            'category_id' => 'nullable|integer',
            'type' => 'nullable|string|max:255',
            'img' => 'nullable|image|max:2048',
            'short_desc' => 'nullable|string',
        ]);

        $data = $request->only([
            'name',
            'brand',
            'long_desc',
            'price',
            'sale_price',
            'type',
            'category',
            'category_id',
            'short_desc',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('product'), $filename);
            $data['img'] = $filename;
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
    
        // Validation (chỉnh lại đúng input image)
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
            'img' => 'nullable|image|max:2048', // sửa đúng ở đây
        ]);
    
        // lấy dữ liệu từ form
        $data = [
            'name' => $request->name,
            'brand' => $request->brand,
            'type' => $request->type,
            'category' => $request->category,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
        ];
    
        // nếu có ảnh mới thì lưu vào DB
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = time() . '_' . $file->getClientOriginalName();
    
            $file->move(public_path('product'), $filename);
            
            $data['img'] = $filename; // lưu vào trường img
        }
    
        $product->update($data);
    
        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được cập nhật.');
    }
    
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Xóa hình ảnh nếu có
        if ($product->img && file_exists(public_path($product->img))) {
            unlink(public_path($product->img));
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được xóa thành công!');
    }
}
