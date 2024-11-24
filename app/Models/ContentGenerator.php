<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentGenerator extends Model
{
    use HasFactory;

    protected $table = "content_generators";

    protected $fillable = [
        'icon',
        'title',
        'description',
        'status',
        'order_id',
    ];
}

