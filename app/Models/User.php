<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
     //user role
    public function isAdmin() {
        return $this->role === 'admin';
     }
 
     public function isUser() {
        return $this->role === 'user';
     }
     public function scopeActive($query){
        return $query->where('active',1);
     }
     public function scopeInActive($query){
        return $query->where('active',0);
     }
    public function profiles(){
        return $this->belongsTo(profile::class,'user_id');
    }
    public function foods(){
        return $this->hasMany(food::class,'user_id');
    }
    public function places(){
        return $this->belongsTo(place::class,'user_id');
    }
    public function orders(){
        return $this->belongsTo(Order::class,'user_id');
    }


    public function district(){
        return $this->belongsTo(District::class,'district_id');
    }

}
