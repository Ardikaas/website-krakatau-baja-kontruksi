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
        'image',
        'summary',
        'summary_en',
        'previous_jobs',
        'previous_jobs_en',
        'full_body_image',
    ];

    public function getTranslatedPositionAttribute()
    {
        return app()->getLocale() == 'en' && $this->position_en ? $this->position_en : $this->position;
    }
}
