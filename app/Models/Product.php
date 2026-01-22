<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category',
        'name',
        'slug',
        'description',
        'thumbnail',
        'spec_image',
    ];

    protected $casts = [
        'thumbnail' => 'array',
    ];
}
