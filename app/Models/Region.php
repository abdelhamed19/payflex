<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends BaseModel
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function cities()
    {
        return $this->hasMany(City::class);
    }

}
