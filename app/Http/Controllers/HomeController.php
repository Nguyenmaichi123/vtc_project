<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'home']);
    }

    public function home()
    {
        $products1 = Product::whereBetween('id', [1, 4])->get();

        
        $products2 = Product::whereBetween('id', [5, 8])->get();

    

        

     
        
        return view('home.index', compact('products1', 'products2'));
    }
}
