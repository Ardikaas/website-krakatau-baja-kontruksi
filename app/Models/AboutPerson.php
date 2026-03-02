<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutPerson extends Model
{
    protected $fillable = [
        'type',
        'name',
        'position',
        'position_en',
        'image'
    ];

    public function getTranslatedPositionAttribute()
    {
        return app()->getLocale() == 'en' && $this->position_en ? $this->position_en : $this->position;
    }
}
