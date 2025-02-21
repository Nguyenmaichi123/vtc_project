<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts'; // Đảm bảo bảng trỏ đúng

    // Nếu bạn có các trường cần mass assignable
    protected $fillable = ['title', 'content', 'category'];
}
