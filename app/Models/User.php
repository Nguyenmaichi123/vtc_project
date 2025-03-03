<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = ['deleted_at'];

    // Quan hệ với Order
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // Kiểm tra nếu user là admin
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    // Hiển thị tên chữ hoa
    public function getFormattedNameAttribute()
    {
        return strtoupper($this->name);
    }
}
