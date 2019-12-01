<?php

namespace App\Http\Controllers;

use App\User;
use Socialite;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
            'active' => true,
            'token'  => $this->token,
            'name'  => $socialUser->name,
            'email' => $socialUser->email,
            'facebook_id' => $socialUser->id,
            'avatar' => $socialUser->avatar_original,
            'password' => Hash::make(Str::random(8)),
            'wallet_id' => strtoupper(Str::random(2)) . rand(1, 10) . strtoupper(Str::random(1)) . rand(1, 100) . strtoupper(Str::random(2)),
        ]);

        if ($user) {
            $user->update(['avatar' => $socialUser->avatar_original]);
            try {

                $subject = 'Email Verification';
                $link = url('users/verify/' . $user->email . '/' . $this->token);
                $message = 'Please complete your registration by verifing your email, ';
                $message .= 'follow link below to verify your email ' . $link;

                Mail::to(request()->email)->send(new RegistrationNotification($message, $subject, $link));
            } catch (\Exception $e) {
                Log::info('Cound not send Registration Email');
            }
        }

        $user ? Auth::login($user) : false;

        return Auth::check();
    }

    protected function login($user)
    {
        Auth::login($user);
        return Auth::check();
    }
}
