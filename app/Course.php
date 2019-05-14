<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
    	'name', 'desc', 'price', 'user_id_owner', 'category_id', 'requirements', 'timeH', 'timeM', 'total_class'
    ];

    public function users()
    {
    	return $this->hasMany('App\User');
    }

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function course_item_chapters()
    {
        return $this->hasMany('App\CourseItemChapter');
    }

    public function userGroups()
    {
        return $this->belongsToMany('App\UserGroup');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function author()
    {
        if($this->course_type == 1){
            return $this->belongsTo('App\Admin', 'user_id_owner');
        }
        return $this->belongsTo('App\User', 'user_id_owner');
    }

    public function cart()
    {
        return $this->hasMany('App\Cart');
    }

    public function rating()
    {
        return $this->belongsToMany('App\User', 'ratings', 'user_id', 'course_id')->withPivot('user_id', 'course_id', 'star', 'comment');
    }

}