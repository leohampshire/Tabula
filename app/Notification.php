<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'type_notification', 'desc_notification', 'status', 'user_id'
    ];
}
