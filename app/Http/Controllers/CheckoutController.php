<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use App\Mail\OrderConfirmationMail;
use Illuminate\Support\Facades\Mail;



class CheckoutController extends Controller
{
    public function index()
    {
      
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('home')->with('error', 'Giỏ hàng của bạn đang trống!');
        }   

        $productIds = array_keys($cart);
        $products = Product::whereIn('id', $productIds)->get();

        foreach ($products as $product) {
            $product->quantity = $cart[$product->id]['quantity'];
        }

        return view('checkout', compact('products'));
    }

    public function placeOrder(Request $request)
    {
        $total = 0;
        foreach(session('cart') as $item)
        {
            $total += $item['total_price'];
        }

        $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'phone' => 'nullable|numeric',
            'address' => 'required',
            'city' => 'required',
            'payment_method' => 'required'
        ]);

        $email = $request->email;
        $name = $request->name;
        $phone = $request->phone;
        $address = $request->address;
        $city = $request->city;
        $payment_method = $request->payment_method;
        $products = session('cart');
        

        // Lưu đơn hàng
        $order = Order::create([
            'user_id' => Auth::id(), 
            'email' => $email,
            'name' => $name,
            'phone' => $phone,
            'address' => $address,
            'city' => $city,
            'payment_method' => $payment_method,
            'total_price' => $total,
            'status' => 'pending'
        ]);

        // Lưu từng sản phẩm vào bảng order_items
        foreach (session('cart', []) as $productId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);
        }

        Mail::to($order->email)->send(new OrderConfirmationMail($order, $products));
        // Xóa giỏ hàng sau khi đặt hàng
        session()->forget('cart');

        return view('checkoutcomplete',compact('email','name','phone','address','city','payment_method','total','products'));
    }

    
}
