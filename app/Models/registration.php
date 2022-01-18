<?php

namespace App\Models;
//use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class registration extends Authenticatable
{
    //use AuthenticableTrait;
    use HasFactory;
    protected $guarded=[];
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function profiles(){
        return $this->belongsTo(profile::class,'registration_id');
    }
}
