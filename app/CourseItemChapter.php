<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseItemChapter extends Model
{
    protected $fillable = [
    	'name','desc', 'course_id', 'order'
    ];

    public function course_item()
    {
    	return $this->hasMany('App\CourseItem');
    }
    public function course()
    {
    	return $this->belongsTo('App\Course');
    }
}
