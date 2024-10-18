<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigSession07 extends Model
{
    use HasFactory;
    protected $table = 'config_session_07';

    public $timestamps = false;
    protected $fillable = [
        'title_s7',
        'displayed_location'
    ];

    public function toas()
    {
        return $this->hasMany(Building::class, 'title_id');
    }
}
