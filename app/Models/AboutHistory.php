<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutHistory extends Model
{
    protected $fillable = [
        'title',
        'title_en',
        'year',
        'description',
        'description_en',
        'image'
    ];

    public function getTranslatedTitleAttribute()
    {
        return app()->getLocale() == 'en' && $this->title_en ? $this->title_en : $this->title;
    }

    public function getTranslatedDescriptionAttribute()
    {
        return app()->getLocale() == 'en' && $this->description_en ? $this->description_en : $this->description;
    }
}
