<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\UploadTrait;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use UploadTrait;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'provider_id',
        'provider',
        'last_name',
        'email',
        'password',
        'phone',
        'image',
        'is_active',
        'lang',
        'address',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
    public function getFullNameAttribute()
    {
        return $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
    }
    public function createUserToken()
    {
        return $this->createToken('auth_token')->plainTextToken;
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
