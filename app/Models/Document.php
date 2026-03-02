<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_en',
        'file',
        'size',
    ];

    public function getTranslatedTitleAttribute()
    {
        return app()->getLocale() == 'en' && $this->title_en ? $this->title_en : $this->title;
    }
}
