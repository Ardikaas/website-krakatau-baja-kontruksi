<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutPerson extends Model
{
    protected $fillable = [
        'type',
        'name',
        'position',
        'image'
    ];
}
