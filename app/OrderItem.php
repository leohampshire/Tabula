<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
	protected $table = 'order_items';
	
	protected $fillable = [
		'value',
		'discount',
		'author_id',
		'user_id',
		'order_id',
	];

	public function course()
	{
		return $this->belongsTo('App\Course');
	}

	public function author($type)
	{
		if ($type == 2) {
			return $this->belongsTo('App\User', 'author_id');
		}return $this->belongsTo('App\Admin', 'author_id');
	}

}
