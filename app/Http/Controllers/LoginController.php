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

    public function showLogin()
    {
        $app = $this->getAppDetails();
        return view('users/login', compact('app'));
    }

    public function login()
    {
        $userData = $this->validate(request(), [
            'password'  => 'required|min:5',
            'email'     => 'required|exists:users|email|min:5|max:40',

        ]);

        $userData['active'] = true;

        $status = Auth::attempt($userData, request()->has('remember'));

        $route = $status ? Auth::user()->route : false;

        $user = $status ? false : User::whereEmail($userData['email'])->first();

        $response = (object) ['status' => $status, 'active' => $status ? false : $user->active];

        return $status ? redirect($route) : back()->withResponse($response);
    }


    public function logout()
    {
        Auth::logout();
        return redirect(route('user.login'));
    }
}
