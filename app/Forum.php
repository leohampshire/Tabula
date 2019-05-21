<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $fillable = ['title','question', 'course_id', 'user_id', 'answer'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function forums()
    {
    	return $this->hasMany('App\Forum', 'answer');
    }
}
