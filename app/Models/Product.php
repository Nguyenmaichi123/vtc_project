<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'brand',
        'long_desc',
        'price',
        'sale_price',
        'type',
        'category', // Giữ nguyên category dạng string
        'category_id', // Thêm category_id để liên kết với bảng categories
        'img',
        'short_desc'
    ];

    // ✅ Định nghĩa quan hệ với Category
    public function categoryRelation()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}


