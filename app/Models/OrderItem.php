<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'product_id', 'quantity', 'price'];

    // Quan hệ với bảng Orders
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    // Quan hệ với bảng Products
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
