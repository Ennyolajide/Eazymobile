<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    //


    public function __contruct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        $referrer = null;

        return view('users/login', compact('referrer'));
    }


    public function login()
    {
        $invalidResponse = 'Invalid Username/Password';
        $inactiveResponse = 'Account Inactive, please check your email inbox or email spam ';
        $inactiveResponse .= 'folder to verify email and complete registration.';

        $userData = $this->validate(request(), [
            'email'     => 'required|exists:users|email|min:5|max:40',
            'password'  => 'required|min:5',
            //'active'    => true
        ]);

        if (Auth::attempt($userData, request()->has('remember'))) {

            return redirect('/dashboard');
        } else {
            $user = User::whereEmail(request()->email)->first();

            return back()->withResponse($user->active ? $invalidResponse : $inactiveResponse);
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect(route('user.login'));
    }
}
