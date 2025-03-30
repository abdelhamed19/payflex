<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        $this->attributes['name'] = json_encode($value, JSON_UNESCAPED_UNICODE);
    }
}
