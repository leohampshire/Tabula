<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseItemType extends Model
{
	protected $table = 'course_item_types';

    public function courseitems()
    {
    	return $this->hasMany('App\CourseItem');
    }
}
