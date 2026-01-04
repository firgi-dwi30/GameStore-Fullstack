<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'title',
        'description',
        'developer',
        'cover',
        'genres',
        'modes',
        'platforms',
    ];

    protected $casts = [
        'genres' => 'array',
        'modes' => 'array',
        'platforms' => 'array',
    ];
}
