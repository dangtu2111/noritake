<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromotionEmail extends Model
{
    use HasFactory;

    protected $table = 'promotion_emails';

    protected $fillable = ['name','email', 'is_subscribed'];
}
