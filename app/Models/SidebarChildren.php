<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SidebarChildren extends BaseModel
{
    use HasFactory;
    protected $guarded = [];
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = json_encode($value, JSON_UNESCAPED_UNICODE);
    }
}
