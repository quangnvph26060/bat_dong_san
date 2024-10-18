<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'company_name',
        'departments',
        'address',
        'hotline',
        'email',
        'banner',
        'main_title',
        'short_content',
        'image_container',
        'image_thumbnail',
        'title',
        'content',
        'footer',
        'logo',
        'icon',
        'seo_description',
        'seo_keyword',
        'seo_title',
    ];

    protected $casts = [
        'image_thumbnail' => 'array',
        'title' => 'array',
        'content' => 'array',
    ];
}
