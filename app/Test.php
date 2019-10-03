<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable= ['user_id', 'course_item_id', 'answers', 'correct'];

    public function tests()
    {
        return $this->hasMany('App\TestUser', 'test_id');
    }

    public function item()
    {
        return $this->belongsTo('App\CourseItem', 'course_item_id');
    }

    public function course()
    {
        return $this->belongsTo('App\Course', 'course_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
