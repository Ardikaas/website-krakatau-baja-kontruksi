<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutHistory extends Model
{
    protected $fillable = [
        'title',
        'year',
        'description',
        'image'
    ];
}
