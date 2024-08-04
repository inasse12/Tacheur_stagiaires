<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


use Laravel\Passport\HasApiTokens;
// use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'email',
        'password',
        'role'
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function admin(){
        return $this->hasOne(Admin::class);
    }

    public function client(){
        return $this->hasOne(Client::class);
    }

    public function tacheur(){
        return $this->hasOne(Tacheur::class);
    }

 

    public function isAdmin()
    {
        return $this->role == 'Admin';
    }


    public function isClient()
    {
        return $this->role == 'Client';
    }


    public function isTacheur()
    {
        return $this->role == 'Tacheur';
    }

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
