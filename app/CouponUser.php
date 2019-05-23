<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CouponUser extends Model
{
	protected $table = 'coupon_user';
    protected $fillable = [
    	'coupon_id', 'user_id'
    ];
}
