<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CourseUser;
use App\Notification;
use DateTime;

class NotificationController extends Controller
{
    public function index()
    {
		$notifications = Notification::orderBy('id', 'desc')->get(); 
		foreach ($notifications as $notification) {
			$notification->status = 2;
			$notification->save();
		}
    	
    	return view('admin.pages.notification.index')
    	->with('notifications', $notifications);
    }

    public function increaseTime(Request $request){

    	$course = CourseUser::find($request->id);

    	$data = new DateTime($course->expired);
	    $data->modify("+{$request->increase} month"); 
	    $course->expired =  $data->format('Y-m-d');
	    $course->save();
	    return redirect()->back()->with('success', 'Curso extendido para o usuário');
	}
	
	public function changeStatus($id)
	{
		$notification = Notification::find($id);
		if($notification->status == 1){
			$notification->status = 2;
		}else{
			$notification->status = 1;
		}
		$notification->save();
		return redirect()->back();
	}

	public function show($id)
	{
		$notification = Notification::find($id);
		$notification->status = 2;
		$notification->save();
		return view('admin.pages.notification.show')->with('notification', $notification);
	}

	public function delete(Notification $notification)
	{
		$notification->delete();
		return redirect()->back()
		->with('success', 'Notificação removida');
	}
}
