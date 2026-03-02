<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSetting extends Model
{
    protected $fillable = [
        'key',
        'value',
        'value_en'
    ];

    public function getTranslatedValueAttribute()
    {
        return app()->getLocale() == 'en' && $this->value_en ? $this->value_en : $this->value;
    }
}
