<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $table = "promotions";

    protected $fillable = [
        'icon',
        'title',
        'buton_text',
        'buton_link',
        'hot',
        'status',
        'order_id',
    ];
}

