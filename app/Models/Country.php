<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends BaseModel
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    public function getTimezonesAttribute()
    {
        return json_decode($this->attributes['timezones'], true);
    }
    public function getTranslationsAttribute()
    {
        return json_decode($this->attributes['timezones'], true);
    }
    public function getLanguagesAttribute()
    {
        return json_decode($this->attributes['timezones'], true);
    }

}
