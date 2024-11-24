<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    use HasFactory;

    protected $table = 'homepage_sections';

    protected $fillable = [
        'section_name',
        'url_slug',
        'title',
        'subtitle',
        'content',
        'button_text',
        'button_link',
        'image_path',
        'video_link',
        'display_order',
        'is_active',
    ];

}
