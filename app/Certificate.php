<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable =[
    	'path', 'user_id', 'course_id'
    ];

    public function course()
    {
    	return $this->belongsTo('App\Course');
    }
}
