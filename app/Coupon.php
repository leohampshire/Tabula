<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
    	'type_discount', 'type_coupon', 'value_coupon', 'active', 'desc_coupon', 'type_id', 'cod_coupon', 'user_id', 'limit',
    ];

    public function user()
    {
        return $this->belongsToMany('App\User');
    }
}
