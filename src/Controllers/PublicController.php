<?php

namespace Laralum\Notifications\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Laralum\Notifications\Models\Notification;
use Laralum\Notifications\Models\Settings;
use Laralum\Notifications\Notifications\MessageNotification;
use Laralum\Users\Models\User;

class PublicController extends Controller
{
    /**
     * Display a listing of all the notifications.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::findOrFail(Auth::id());

        return view('laralum_notifications::public.index', ['notifications' => $user->notifications]);
    }

    /**
     * Display the notification.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        $this->authorize('view', $notification);

        $notification->markAsRead();

        return view('laralum_notifications::public.show', ['notification' => $notification]);
    }

}
