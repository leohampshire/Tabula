<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestUser extends Model
{
	protected $table = 'test_users';

    protected $fillable =['desc','answer', 'course_item_id', 'user_id'];
}
