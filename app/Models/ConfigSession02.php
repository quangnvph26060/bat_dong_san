<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigSession02 extends Model
{
    use HasFactory;
    protected $table = 'config_session_02';

    public $timestamps = false;
    protected $fillable = [
        'title_s2',
        'link_video',
        'text_s2'
    ];
}
