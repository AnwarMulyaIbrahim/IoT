<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'time',
        'day',
    ];

    protected $casts = [
        'day' => 'array',
        'time' => 'datetime:H:i',
    ];
}
