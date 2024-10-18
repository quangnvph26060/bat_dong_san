<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigSession06 extends Model
{
    use HasFactory;
    protected $table = 'config_session_06';

    public $timestamps = false;
    protected $fillable = [
        'title_s6',
        'slider_s6',
        'text_s6',
        'images_s6'
    ];

    protected $casts = [
        'images_s6' => 'array',
        'slider_s6' => 'array'
    ];
}
