<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
		'user_id', 'course_id', 'coupon', 'discount'     
	];

	public function cart(){
        return $this->belongsToMany('App\User', 'carts', 'course_id', 'user_id');
    }

}
