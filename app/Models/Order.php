<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'email', 'name', 'phone', 'address', 'city', 'payment_method', 'total_price', 'status'
    ];

    // Quan hệ với OrderItem
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
