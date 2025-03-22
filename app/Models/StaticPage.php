<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'meta_title',
        'meta_description',
        'is_active',
        'active_pr',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}