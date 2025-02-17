<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class HomeController extends Controller
{
    public function home()
    {
        $products1 = Products::whereBetween('id', [1, 4])->get();

        
        $products2 = Products::whereBetween('id', [5, 8])->get();

        
        return view('home.index', compact('products1', 'products2'));
    }
}
