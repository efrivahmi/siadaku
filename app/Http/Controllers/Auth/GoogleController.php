<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::where('email', $googleUser->getEmail())->first();

            if ($user && $user->is_active) {
                // Update google id if it's missing
                if (!$user->google_id) {
                    $user->update([
                        'google_id' => $googleUser->getId(),
                        'profile_photo' => $googleUser->getAvatar()
                    ]);
                }
                Auth::login($user);
                return redirect()->intended('/admin'); // Redirect to filament admin or dashboard
            } else {
                return redirect('/login')->withErrors(['email' => 'Your account is not registered or inactive. Contact Administrator.']);
            }
        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['email' => 'Failed to login with Google.']);
        }
    }
}
