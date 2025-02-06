<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function home()
    {
        $products1 = Product::whereBetween('id', [1, 4])->get();

        
        $products2 = Product::whereBetween('id', [5, 8])->get();

        
        return view('home.index', compact('products1', 'products2'));
    }
}
