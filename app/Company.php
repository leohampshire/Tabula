<?php

namespace App;

use App\Notifications\CompanyResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{
    
    protected $fillable = [
        'mission', 'user_id', 'cover',
    ];

 
    public function teachers()
    {
    	return $this->hasMany('App\User');
    }
}
