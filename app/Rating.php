<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
    	'user_id', 'course_id', 'comment', 'star'
    ];

    protected $table = 'ratings';

    public function  totalStar($course_id)
    {
    	$star = $this->where('course_id', $course_id)->sum('star');
    	return $star;
    }
}
