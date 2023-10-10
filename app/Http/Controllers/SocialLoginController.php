<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    //--googleLogin
    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }
    //--googleLogin
    public function googleLogin_redirect(Request $request)
    {
        $socialUser = Socialite::driver('google')->user();
        $user = User::where('email', $socialUser->email)->first();

        if ($user) {
            $user->update([
                'google_id' => $socialUser->id,
            ]);
            Auth::login($user);
            return redirect()->route('dashboard')->with('success', 'Login Successfully');
        } else {
            $newUser = User::create([
                'name' => $socialUser->name,
                'email' => $socialUser->email,
                'google_id' => $socialUser->id,
            ]);
            Auth::login($newUser);
            return redirect()->route('dashboard')->with('success', 'Login Successfully');
        }
    }

    //----facebookLogin
    public function facebookLogin()
    {
        return Socialite::driver('facebook')->redirect();
    }

    //----facebookLogin_redirect
    public function facebookLogin_redirect()
    {
        $socialUser = Socialite::driver('facebook')->user();
        // dd($socialUser);
        $user = User::where('fb_id', $socialUser->id)->first();
        if ($user) {
            Auth::login($user);
            return redirect()->route('dashboard')->with('success', 'Login Successfully');
        } else {
            $user = User::create([
                'name' => $socialUser->name,
                'email' => 'test@gmail.com',
                'fb_id' => $socialUser->id,
            ]);
            Auth::login($user);
            return redirect()->route('dashboard')->with('success', 'Login Successfully');
        }
    }

    //--githubLogin
    public function githubLogin()
    {
        return Socialite::driver('github')->redirect();
    }

    //--githubLogin_redirect
    public function githubLogin_redirect()
    {
        $socialUser = Socialite::driver('github')->user();
        $user = User::where('github_id', $socialUser->id)->orWhere('email', $socialUser->email)->first();
        if ($user) {
            $user->update([
                'github_id' => $socialUser->id,
            ]);
            Auth::login($user);
            return redirect()->route('dashboard')->with('success', 'Login Successfully');
        } else {
            $user = User::create([
                'name' => $socialUser->name,
                'email' => $socialUser->email,
                'github_id' => $socialUser->id,
            ]);
            Auth::login($user);
            return redirect()->route('dashboard')->with('success', 'Login Successfully');
        }
    }
}
