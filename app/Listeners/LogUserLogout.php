<?php

namespace App\Listeners;

use App\Models\UserSessionHistory;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogUserLogout
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
    public function handle(Logout $event)
    {
        // $guard = Auth::guard();
        // \Log::info('Current guard:', ['guard' => $guard]);

        // if ($guard->check()) {
        //     // Get the authenticated user (either regular user or admin)
        //     $user = $guard->user();
        //     $isAdmin = $user->is_admin ?? false;
        //     $userIdOrAdminId = $isAdmin ? 'admin_id' : 'user_id';

        //     $sessionHistory = UserSessionHistory::where($userIdOrAdminId, $user->id)
        //         ->whereNull('logout_time')
        //         ->latest()
        //         ->first();

        //     if ($sessionHistory) {
        //         $sessionHistory->update(['logout_time' => now()]);
        //     } else {
        //         // Handle the case where no session history record is found
        //         // Optionally log or create a new record
        //     }
        // }
        if (Auth::guard('admin')->check()) {
            $sessionHistory = UserSessionHistory::where('admin_id', $event->user->id)
            ->whereNull('logout_time')
            ->latest()
            ->first();

            // Check if a session record exists
            if ($sessionHistory) {
                // If it exists, update the logout_time
                $sessionHistory->update(['logout_time' => now()]);
            } else {
                // Handle the case where no session history record is found
                // Optionally log or create a new record
            }
        }else{
            $sessionHistory = UserSessionHistory::where('user_id', $event->user->id)
            ->whereNull('logout_time')
            ->latest()
            ->first();

            // Check if a session record exists
            if ($sessionHistory) {
                // If it exists, update the logout_time
                $sessionHistory->update(['logout_time' => now()]);
            } else {
                // Handle the case where no session history record is found
                // Optionally log or create a new record
            }
        }


        // UserSessionHistory::where('user_id', $event->user->id)
        //     ->whereNull('logout_time')
        //     ->latest()
        //     ->first()
        //     ->update(['logout_time' => now()]);
    }
}
