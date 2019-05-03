<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $table = 'blog_posts';    

    protected $fillable = [
		'name', 'category_id', 'keywords', 'meta_title', 'meta_description',  'content', 'thumbnail', 'urn'
	];

	public function comments()
	{
		return $this->hasMany('App\BlogComment');
	}

	public function category()
	{
		return $this->belongsTo('App\BlogCategory');
	}
}
