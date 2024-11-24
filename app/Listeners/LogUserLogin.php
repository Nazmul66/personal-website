<?php

namespace App\Listeners;

use App\Models\UserSessionHistory;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogUserLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event)
    {
        if (Auth::guard('admin')->check()) {
            // If the authenticated user is an admin, use `admin_id`
            if (!UserSessionHistory::where('admin_id', $event->user->id)->whereNull('logout_time')->exists()) {
                UserSessionHistory::create([
                    'admin_id' => $event->user->id,  // Store in admin_id instead of user_id
                    'login_time' => now(),
                ]);
            }
        } else {
            // If the authenticated user is not an admin, use `user_id`
            if (!UserSessionHistory::where('user_id', $event->user->id)->whereNull('logout_time')->exists()) {
                UserSessionHistory::create([
                    'user_id' => $event->user->id,  // Store in user_id
                    'login_time' => now(),
                ]);
            }
        }
        // if (!UserSessionHistory::where('user_id', $event->user->id)->whereNull('logout_time')->exists()) {
        //     UserSessionHistory::create([
        //         'user_id' => $event->user->id,
        //         'login_time' => now(),
        //     ]);
        // }
        // UserSessionHistory::create([
        //     'user_id' => $event->user->id,
        //     'login_time' => now(),
        // ]);
    }
}
