<?php

namespace App\Http\Controllers;

use App\User;
use Socialite;
use App\Mail\Main;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationNotification;

class SocialAuthFacebookController extends Controller
{
    //
    protected $token;

    /**
     * Create a redirect method to facebook api.
     *
     * @return void
     */
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback()
    {
        $socialUser = Socialite::driver('facebook')->user();
        $user = User::where('email', $socialUser->email)->first();

        $status = $user ? $this->login($user) : $this->createUser($socialUser);


        $alert = $status ? $this->welcomeAlert($user) : false;

        return $status ? redirect()->route('dashboard.index')->withAlert($alert) : back();
    }

    /**
     *
     */
    protected function welcomeAlert($user)
    {
        return (object) [
            'avatar' => Auth::user()->avatar,
            'message' => $user ? 'Login Successful' : 'Registration Succesfully',
        ];
    }

    /**
     * create a new user with the FB details
     */
    protected function createUser($socialUser)
    {
        $this->token = md5(uniqid());

        $user = User::create([
            'active' => true, 'token'  => $this->token,
            'name'  => $socialUser->name, 'email' => $socialUser->email,
            'facebook_id' => $socialUser->id,
            'avatar' => $socialUser->avatar_original,
            'password' => Hash::make(Str::random(8)),
        ]);

        $link = $user ? url('users/verify/' . $user->email . '/' . $this->token) : false;
        $user ? Mail::to($user->email)->send(new RegistrationNotification($user->name, $link)) : false;

        $user ? Auth::login($user) : false;

        return Auth::check();
    }

    protected function login($user)
    {
        Auth::login($user);
        return Auth::check();
    }
}
