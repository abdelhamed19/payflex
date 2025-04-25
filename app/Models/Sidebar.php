<?php

namespace App\Models;

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
    public function setRouteAttribute($value)
    {
        $this->attributes['route'] = '/admin'.$value;
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'sidebar_role', 'sidebar_id', 'role_id');
    }
    protected static function booted()
    {
        static::creating(function($sidebar){
            $name = json_decode($sidebar->name, true)['en'];
            $name = strtolower(trim($name));
            $sidebar->route = '/'.$name. '/' . 'index';
        });
        static::addGlobalScope('role_id', function ($builder) {
            $user = auth()->user();
            return $builder->whereHas('roles', function ($query) use ($user) {
                $query->where('role_id', $user->role_id);
            });
        });
    }
}
