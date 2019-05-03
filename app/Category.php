<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
	use SoftDeletes;

    protected $fillable = [
    	'name', 'urn', 'desktop_index', 'mobile_index', 'desktop_hex_bg', 'mobile_hex_bg', 'hex_icon', 'hex_course_icon', 'category_id'
	];
    
    public function courses()
    {
        return $this->hasMany('App\Course');
    }

    public function category()
    {
    	return $this->belongsTo('App\Category', 'category_id');
    }

    protected $dates = ['deleted_at'];
}
