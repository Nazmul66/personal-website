<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HowWorks extends Model
{
    use HasFactory;

    protected $table = "how_works";

    protected $fillable = [
        'title',
        'description',
        'status',
        'order_id',
    ];
}

