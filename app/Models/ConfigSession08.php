<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigSession08 extends Model
{
    use HasFactory;
    protected $table = 'config_session_08';

    public $timestamps = false;
    protected $fillable = [
       'title_s8', 'content_s8', 'images_s8'
    ];

    protected $casts = [
        'images_s8' => 'array',
    ];
}
