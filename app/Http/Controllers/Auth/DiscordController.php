<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserSessionHistory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class DiscordController extends Controller
{
    public function redirectToDiscord()
    {
        return Socialite::driver('discord')->redirect();
    }

    public function handleDiscordCallback()
    {
        try {
            $discordUser = Socialite::driver('discord')->user();
            $user = User::where('discord_id', $discordUser->id)->first();

            if ($user) {
                Auth::login($user);
            } else {

                $fullName = $discordUser->user['global_name'];
                $nameParts = explode(' ', $fullName);

                if (count($nameParts) > 1) {
                    $lastname = array_pop($nameParts);
                    $firstname = implode(' ', $nameParts);
                } else {

                    $firstname = $fullName;
                    $lastname = '';
                }

                $user = User::create([
                    'username' => $discordUser->name,
                    'name' => $firstname,
                    'last_name' => $lastname,
                    'email' => $discordUser->email,
                    'email_verified_at' => now(),
                    'discord_id' => $discordUser->id,
                    'avatar' => $discordUser->avatar,
                    'password' => bcrypt('12345678')
                ]);
                Auth::login($user);
            }

            return redirect()->route('user.dashboard.dashboard');
        } catch (\Exception $e) {
            // dd($e);
            Toastr::error($e->getMessage(), trans('Login Failed'), ["positionClass" => "toast-top-right"]);
            // Toastr::error(trans('Failed to login with Discord'), 'Error', ["positionClass" => "toast-top-right"]);
            return redirect('/login');
        }
    }
}
