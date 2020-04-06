<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'user_role',
        'user_email',
        'user_status',
        'previous_status',
        'password'
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    const roles = [
        0 => 'Admin',
        1 => 'User'
    ];

    const status = [
        0 => 'Deactivated',
        1 => 'Pending',
        2 => 'Verified'
    ];

    public function Comments() {
        return $this->hasMany('\App\Comments');
    }

    public function Notifications() {
        return $this->hasMany('\App\Notification');
    }
}
