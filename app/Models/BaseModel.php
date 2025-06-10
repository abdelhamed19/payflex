<?php

namespace App\Models;

use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use HasFactory, UploadTrait;
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
    public function getImageAttribute()
    {
        if ($this->attributes['image'] != null) {
            return $this->getFileUrl($this->attributes['image']);
        } else {
            return $this->getFileUrl('admin/default.jpg');
        }
    }
    public function setImageAttribute($value)
    {
        if ($value != null) {
            if (isset($this->attributes['image']) && $this->attributes['image'] != 'admin/default.jpg') {
                $this->deleteFile($this->attributes['image']);
                $this->attributes['image'] = $value;
            }
            else {
                $this->attributes['image'] = $value;
            }
        } else {
            $this->attributes['image'] = 'admin/default.jpg';
        }
    }
}
