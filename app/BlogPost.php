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
		return $this->hasMany('App\BlogComment', 'post_id');
	}

	public function category()
	{
		return $this->belongsTo('App\BlogCategory');
	}

	public function tags()
    {
        return $this->belongsToMany('App\Tag', 'post_tags', 'post_id', 'tag_id');
    }
}
