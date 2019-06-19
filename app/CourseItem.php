<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseItem extends Model
{
	protected $fillable = [
        'name','desc','path','course_item_chapter_id', 'course_item_types_id', 'order', 'freeItem'
    ];
    public function course_item_type()
    {
    	return $this->belongsTo('App\CourseItemType', 'course_item_types_id');
    }

    public function course_item_chapter()
    {
    	return $this->belongsTo('App\CourseItemChapter', 'course_item_chapter_id');
    }

    public function course_item_parent()
    {
        return $this->hasMany('App\CourseItem', 'course_items_parent');
    }

    public function test()
    {
        return $this->hasMany('App\TestItem', 'course_item_id');
    }

    public function item_checked()
    {
        return $this->belongsToMany('App\User', 'course_item_user', 'course_item_id', 'user_id')
        ->withPivot('course_item_status_id');
    }

}
