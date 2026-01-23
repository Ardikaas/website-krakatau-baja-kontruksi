<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'image',
        'description',
        'scope',
        'location',
        'client',
        'date',
        'category',
        'challenges',
        'solutions'
    ];

    protected $casts = [
        'solutions' => 'array',
        'date' => 'date'
    ];
}
