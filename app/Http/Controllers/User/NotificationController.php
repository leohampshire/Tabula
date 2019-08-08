<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notification;
class NotificationController extends Controller
{
    public function delete(Notification $notification)
    {
        $notification->user_id = null;
        $notification->save();
        return redirect()->back()
        ->with('success', 'Notificação removida');
    }
}
