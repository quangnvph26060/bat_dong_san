<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigSession05 extends Model
{
    use HasFactory;
    protected $table = 'config_session_05';

    public $timestamps = false;
    protected $fillable = [
        'main_title_s5',
        'extra_title_s5',
        'text_s5',
        'main_image_s5',
        'extra_image_s5'
    ];
}
