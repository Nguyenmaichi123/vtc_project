<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['name', 'brand', 'long_desc', 'price', 'sale_price', 'type', 
        'category', 'img', 'short_desc'];
}
