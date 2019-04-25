<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
{
    use SoftDeletes;

    protected $table = 'categories';

    protected $fillable = [
    	'name', 'urn', 'category_id',
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
