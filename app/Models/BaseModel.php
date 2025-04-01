<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use HasFactory;
    public function getTranslation($attribute, $locale = null)
    {
        if (is_null(json_decode($attribute, true))) {
            return $attribute;
        }
        if (request()->is('api/*')) {
            $locale = app()->getLocale();
        } else {
            $locale = session()->get('lang');
        }
        $attribute = json_decode($attribute, true);
        if (isset($attribute[$locale])) {
            return $attribute[$locale];
        } else {
            return $attribute['en'];
        }
    }
    public function getNameAttribute($value)
    {
        if (request()->is('api/*')) {
            return $this->getTranslation($value, request()->header('Lang'));
        } else {
            return $value;
        }
    }
}
