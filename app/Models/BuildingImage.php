<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildingImage extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['building_id', 'image'];

    public function toa()
    {
        return $this->belongsTo(Building::class, 'building_id');
    }
}
