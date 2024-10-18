<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigSession03 extends Model
{
    use HasFactory;
    protected $table = 'config_session_03';

    public $timestamps = false;
    protected $fillable = [
        'title_s3',
        'text_s3',
        'image_s3'
    ];

    protected $casts = [
        'image_s3' => 'array'
    ];
}
