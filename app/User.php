<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * @return bool
     *
     * isSuperAdmin
     *
     */

    public function isSuperAdmin(){

        return $this->role === "admin" || $this->role === "super_admin";

    }


    public function posts()
    {
        return $this->hasMany("App\Post");
    }


    public function SocialServiceProvider(){

        $this->hasMany(User::class);

    }


}
