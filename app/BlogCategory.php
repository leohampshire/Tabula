<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
	protected $table = 'blog_categories';    

    protected $fillable = [
		'name', 'meta_title', 'keyword', 'meta_description', 'urn',
	];

	public function posts()
	{
		return $this->hasMany('App\BlogPost', 'category_id');
	}
}