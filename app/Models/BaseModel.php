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
        $decoded = json_decode($attribute, true);
        if (!is_array($decoded)) {
            return $attribute;
        }

        if (!$locale) {
            if (request()->is('api/*')) {
                $locale = app()->getLocale();
            } elseif (request()->is('admin/*')) {
                $locale = session('lang', 'en');
            } else {
                $locale = 'en';
            }
        }

        return $decoded[$locale] ?? $decoded['en'] ?? reset($decoded);
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
            } else {
                $this->attributes['image'] = $value;
            }
        } else {
            $this->attributes['image'] = 'admin/default.jpg';
        }
    }
    public function scopeSearch($query, $search)
    {
        if (!empty($search['search']) && $this->isColumnExists('name')) {
            $query->where(function ($q) use ($search) {
                $q->where(function ($sub) use ($search) {
                    $sub->where('name->ar', 'like', "%{$search['search']}%")
                        ->orWhere('name->en', 'like', "%{$search['search']}%")
                        ->orWhere('name', 'like', "%{$search['search']}%");
                });
            });
        }

        if (!empty($search['from'])) {
            $query->whereDate('created_at', '>=', $search['from']);
        }

        if (!empty($search['to'])) {
            $query->whereDate('created_at', '<=', $search['to']);
        }

        // الحالة
        if (isset($search['is_active']) && $search['is_active'] !== '' && $this->isColumnExists('is_active')) {
            $query->where('is_active', $search['is_active']);
        }

        return $query;
    }
}
