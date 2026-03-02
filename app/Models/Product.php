<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category',
        'name',
        'name_en',
        'slug',
        'description',
        'description_en',
        'thumbnail',
        'spec_image',
    ];

    public function getTranslatedNameAttribute()
    {
        return app()->getLocale() == 'en' && $this->name_en ? $this->name_en : $this->name;
    }

    public function getTranslatedDescriptionAttribute()
    {
        return app()->getLocale() == 'en' && $this->description_en ? $this->description_en : $this->description;
    }


    protected $casts = [
        'thumbnail' => 'array',
    ];
}
