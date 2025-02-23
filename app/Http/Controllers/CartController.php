<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function show()
    {
        $cart = session('cart', []);
        $productIds = array_keys($cart);
        $products = Product::whereIn('id', $productIds)->get();

        foreach ($products as $product) {
            $product->quantity = $cart[$product->id]['quantity'];
        }

        return view('products.productscard', compact('products'));
    }

    public function update(Request $request, $id)
{
    $cart = session('cart', []);

    if (isset($cart[$id])) {
        if ($request->has('decrease')) {
            $cart[$id]['quantity'] = max(1, $cart[$id]['quantity'] - 1);
        } elseif ($request->has('increase')) {
            $cart[$id]['quantity'] += 1;
        }
        else {
            $cart[$id]['quantity'] = max(1, $request->input('quantity', 1));
        }


        $cart[$id]['total_price'] = $cart[$id]['quantity'] * $cart[$id]['price'];

        session()->put('cart', $cart);
    }

    return redirect()->route('cart.show');
}


    public function remove($id)
    {
        $cart = session('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->route('cart.show');
    }


    public function getCart()
{
    $cart = session('cart', []);
    
   
    $totalQuantity = array_sum(array_column($cart, 'quantity'));

    return response()->json([
        'totalQuantity' => $totalQuantity 
    ]);
}


}




