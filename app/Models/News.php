<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'content',
        'image',
        'published_at',
        'keywords',
        'status'
    ];

    public static function boot()
    {

        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->title);
        });
    }

    protected $casts = [
        'published_at' => 'datetime',
        'status' => 'boolean'
    ];
}
