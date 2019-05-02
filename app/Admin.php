<?php

namespace App;

use App\Notifications\AdminResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login', 
        'email',
        'password',
        'name',
        'sex',
        'occupation',
        'bio',
        'avatar',
        'img_avatar',
        'interest',
        'birthdate',
        'website',
        'google_plus',
        'twitter',
        'facebook',
        'youtube',
        'state_id',
        'country_id',
        'schooling_id',
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
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPassword($token));
    }

    public function userTypes()
    {
        return $this->belongsTo('App\UserType', 'user_type_id');
    }
}
