<?php

namespace App\Http\Controllers;


use App\User;
use App\Mail\Main;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationNotification;

class RegisterController extends Controller
{
    //


    public function index()
    {
        $app = $this->getAppDetails();
        return view('users/register', compact('referrerId', 'app'));
    }


    public function register()
    {

        $token = md5(uniqid());

        $this->validate(request(), [
            'terms' => 'required|string',
            'name'      => 'required|string|max:50',
            'phone'     => 'required|string|min:10|max:13',
            'password'  => 'required|string|min:5|confirmed',
            'email'     => 'required|string|email|max:255|unique:users',
        ]);

        $status = User::create([
            'active'        => true,
            'token'         => $token,
            'email'         => request()->email,
            'number'        => request()->phone,
            'name'          => ucwords(request()->name),
            'referrer'      => request()->referrerId ?? null,
            'password'      => Hash::make(request()->password),
            'wallet_id'     => Str::random(8) . rand(1, 100) . Str::random(2),
        ]);

        $name = ucwords(request()->name);
        $link = url('users/verify/' . request()->email . '/' . $token);

        $status ? Mail::to(request()->email)->send(new RegistrationNotification($name, $link)) : false;

        return back()->withResponse((object) ['status' => $status]);
    }
}
