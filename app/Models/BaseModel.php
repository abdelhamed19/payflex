<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use HasFactory;
    public function getTranslation($attribute)
    {
        $locale = session()->get('lang');
        if (is_null(json_decode($attribute, true))) {
            return $attribute;
        }
        $attribute = json_decode($attribute, true);
        if (isset($attribute[$locale])) {
            return $attribute[$locale];
        } else {
            return $attribute['en'];
        }
    }
}
