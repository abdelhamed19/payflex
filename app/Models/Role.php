<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends BaseModel
{
    use HasFactory;
    protected $fillable = ['name'];
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_role');
    }
    public function hasPermission($permission)
    {
        return $this->permissions()->where('name', $permission)->exists();
    }
    public function hasAnyPermission($permissions)
    {
        return $this->permissions()->whereIn('name', $permissions)->exists();
    }
}
