<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigSession04 extends Model
{
    use HasFactory;
    protected $table = 'config_session_04';

    public $timestamps = false;
    protected $fillable = [
        'small_banner_s4',
        'text_s4',
        'banner_s4',
        'image_4'
    ];


}
