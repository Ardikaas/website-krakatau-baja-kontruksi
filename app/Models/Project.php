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
        'client',
        'location',
        'category',
        'category_en',
        'date',
        'description',
        'description_en',
        'scope_of_work',
        'scope_of_work_en',
        'challenges',
        'challenges_en',
        'solutions',
        'solutions_en',
        'image'
    ];

    public function getTranslatedTitleAttribute()
    {
        return app()->getLocale() == 'en' && $this->title_en ? $this->title_en : $this->title;
    }

    public function getTranslatedCategoryAttribute()
    {
        return app()->getLocale() == 'en' && $this->category_en ? $this->category_en : $this->category;
    }

    public function getTranslatedDescriptionAttribute()
    {
        return app()->getLocale() == 'en' && $this->description_en ? $this->description_en : $this->description;
    }

    public function getTranslatedScopeOfWorkAttribute()
    {
        return app()->getLocale() == 'en' && $this->scope_of_work_en ? $this->scope_of_work_en : $this->scope_of_work;
    }

    public function getTranslatedChallengesAttribute()
    {
        return app()->getLocale() == 'en' && $this->challenges_en ? $this->challenges_en : $this->challenges;
    }

    public function getTranslatedSolutionsAttribute()
    {
        return app()->getLocale() == 'en' && $this->solutions_en ? $this->solutions_en : $this->solutions;
    }

    protected $casts = [
        'solutions' => 'array',
        'date' => 'date'
    ];
}
