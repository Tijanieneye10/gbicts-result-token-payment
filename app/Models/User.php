<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'email',
        'firstname',
        'lastname',
        'school',
        'role',
        'price',
        'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Let set a mutator for password
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make(strtolower($value));
    }

    // Set name to capital
    public function setNameAtrribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }

    // Set lastname name to capital
    public function setLastNameAtrribute($value)
    {
        $this->attributes['lastname'] = ucfirst($value);
    }

    // Let get a accessor for fullname
    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->lastname}";
    }

    // let connect user and sales
    public function sales()
    {
        return $this->hasMany(Sales::class);
    }
}
