<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    const ROLE_ADMIN = 1;
    const ROLE_CLIENT = 2;

    public function isAdmin (){
        return $this->role == static::ROLE_ADMIN;
    }

    public function getDesktopImageAttribute (){
        return url ('/uploads/users/'.$this->id.'/desktop.jpeg');
    }

    public function orders () {
        return $this->hasMany('App\Order', 'user_id');
    }

}
