<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'client',
        'location',
        'category',
        'date',
        'description',
        'scope_of_work',
        'challenges',
        'solutions',
        'image'
    ];

    protected $casts = [
        'solutions' => 'array',
        'date' => 'date'
    ];
}
