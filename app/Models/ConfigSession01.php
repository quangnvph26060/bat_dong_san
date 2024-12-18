<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigSession01 extends Model
{
    use HasFactory;
    protected $table = 'config_session_01';

    public $timestamps = false;
    protected $fillable = [
        'extra_title',
        'text',
        'main_image',
        'extra_image',
        'main_title'
    ];
}
