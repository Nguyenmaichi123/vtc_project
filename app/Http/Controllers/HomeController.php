<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
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


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products1 = Product::where('category', 'category1')->get();
        $products2 = Product::where('category', 'category2')->get();

        return view('home.index', compact('products1', 'products2'));
    }
  

    public function home()
    {
        $products1 = Product::where('category', 'category1')->get();
        $products2 = Product::where('category', 'category2')->get();

        return view('home.index', compact('products1', 'products2'));
    }
}
