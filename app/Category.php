<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
    	'name', 'urn', 'desktop_index', 'mobile_index', 'desktop_hex_bg', 'mobile_hex_bg', 'hex_icon', 'hex_course_icon',
	];
    
    public function courses()
    {
        return $this->hasMany('App\Course');
    }
}
