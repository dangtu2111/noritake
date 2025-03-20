<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeComponent extends Model
{
    protected $fillable = ['name','type', 'props', 'order', 'active'];
    protected $casts = [
        'props' => 'array', // Tự động chuyển JSON thành mảng
        'active' => 'boolean',
    ];
}