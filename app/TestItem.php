<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestItem extends Model
{
	protected $table = 'test_item';

    protected $fillable = [
        'name','desc','course_item_id', 'course_item_types_id', 'order',
    ];
}
