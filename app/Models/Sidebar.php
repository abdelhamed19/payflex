<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sidebar extends BaseModel
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    public function children()
    {
        return $this->hasMany(SidebarChildren::class, 'sidebar_id', 'id');
    }
    public function setNameAttribute($value)
    {
        $trimed = array_map(function($val){
           return strtolower(trim($val));
        },$value);
        $this->attributes['name'] = json_encode($trimed, JSON_UNESCAPED_UNICODE);
    }
    protected static function booted()
    {
        static::creating(function($sidebar){
            $name = json_decode($sidebar->name, true)['en'];
            $name = strtolower(trim($name));
            $sidebar->route = '/'.$name. '/' . 'index';
        });
    }
}
