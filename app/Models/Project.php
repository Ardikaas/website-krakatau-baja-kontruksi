<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_en',
        'what',
        'what_en',
        'location',
        'location_en',
        'description',
        'description_en',
        'images',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function getTranslatedTitleAttribute()
    {
        return app()->getLocale() == 'en' && $this->title_en ? $this->title_en : $this->title;
    }

    public function getTranslatedWhatAttribute()
    {
        return app()->getLocale() == 'en' && $this->what_en ? $this->what_en : $this->what;
    }

    public function getTranslatedLocationAttribute()
    {
        return app()->getLocale() == 'en' && $this->location_en ? $this->location_en : $this->location;
    }

    public function getTranslatedDescriptionAttribute()
    {
        return app()->getLocale() == 'en' && $this->description_en ? $this->description_en : $this->description;
    }
}
