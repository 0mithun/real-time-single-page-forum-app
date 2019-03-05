<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\NotificationResource;

class NotificationController extends Controller
{
    public function index()
    {
        return [
            'read'          =>  NotificationResource::collection(auth()->user()->readNotifications),
            'unread'          =>  NotificationResource::collection(auth()->user()->unReadNotifications),
    
        ];
    }
    public function markAsRead(Request $request)
    {
        $notification = auth()->user()->notifications()->where('id',$request->id)->first();
        if($notification){
            $notification->markAsRead();
        }
        // ->markAsRead();
    }
}
