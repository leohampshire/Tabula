<?php

namespace App;

use App\Notifications\UserResetPassword;
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
        'name', 
        'email',
        'password',
        'sex', 
        'cpf',
        'birthdate',
        'sex',
        'interest',
        'website',
        'twitter',
        'facebook',
        'google_plus',
        'linkedin',
        'youtube',
        'country_id', 
        'state_id', 
        'schooling_id',
        'empresa_id',
        'avatar', 
        'user_type_id', 
        'bio'
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
        $this->notify(new UserResetPassword($token));
    }

    public function userTypes()
    {
        return $this->belongsTo('App\UserType', 'user_type_id');
    }

    public function courses()
    {
        return $this->hasMany('App\Course', 'user_id_owner')->where('course_type', 2);
    }

    public function myCourses()
    {
        return $this->belongsToMany('App\Course', 'course_user', 'user_id', 'course_id');
    }


    public function cart(){
        return $this->belongsToMany('App\Course', 'carts', 'user_id', 'course_id')->withPivot('user_id', 'course_id');
    }

    public function rating()
    {
        return $this->belongsToMany('App\Course', 'ratings', 'user_id', 'course_id')->withPivot('user_id', 'course_id', 'star', 'comment');
    }
}
