<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemUser extends Model
{
    protected $table='item_user';

    protected $fillable = [
    	'user_id', 'chapter_id'
    ];
}
