<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    protected $fillable = ['building_name', 'title_id'];

    public $timestamps = false;

    public function title()
    {
        return $this->belongsTo(ConfigSession07::class, 'title_id');
    }

    public function images()
    {
        return $this->hasMany(BuildingImage::class, 'building_id');
    }
}
