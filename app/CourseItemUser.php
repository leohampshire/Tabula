<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseItemUser extends Model
{
    protected $table = 'course_item_user';

    protected $fillable = [
		'user_id', 'course_item_id', 'desc', 'course_item_status_id',
    ];
}
