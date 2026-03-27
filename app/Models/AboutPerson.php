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
        'start_date',
        'end_date',
        'image',
        'career_history',
        'organization_history',
        'full_body_image',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'career_history' => 'array',
        'organization_history' => 'array',
    ];

    public function getTranslatedPositionAttribute()
    {
        return app()->getLocale() == 'en' && $this->position_en ? $this->position_en : $this->position;
    }
}
