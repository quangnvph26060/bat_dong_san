<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigSession01 extends Model
{
    use HasFactory;
    protected $fillable = [
        'extra_title',
        'text',
        'main_image',
        'extra_image',
        'main_title'
    ];
}
