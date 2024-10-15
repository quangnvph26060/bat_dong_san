<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailRequest extends Model
{
    use HasFactory;

    protected $fillable = ['user', 'email', 'phone', 'last_sent_at', 'status'];

    protected $casts = [
        'last_sent_at' => 'datetime',
        'status' => 'boolean',
    ];
}
