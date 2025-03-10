<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Menu extends Model
{
    use HasFactory;

    protected $table='menus';

    protected $fillable = [
        'parent_id', 'lft', 'rgt', 'level', 'publish', 'order', 
        'user_id', 'type', 'name', 'slug'
    ];
    
    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }

}