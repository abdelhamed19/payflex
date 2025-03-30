<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends BaseModel
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
