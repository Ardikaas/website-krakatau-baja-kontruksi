<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'image',
        'title',
        'title_en',
        'content',
        'content_en',
        'author',
        'published_at',
    ];

    public function getTranslatedTitleAttribute()
    {
        return app()->getLocale() == 'en' && $this->title_en ? $this->title_en : $this->title;
    }

    public function getTranslatedContentAttribute()
    {
        return app()->getLocale() == 'en' && $this->content_en ? $this->content_en : $this->content;
    }


    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function comments()
    {
        return $this->hasMany(NewsComment::class);
    }
}
