<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationNotification;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    //


    public function index($referrer = null)
    {
        $referrer = $referrer ? User::where('wallet_id', $referrer)->first() : null;

        return view('users/register', compact('referrer'));
    }


    public function register()
    {
        $token = md5(uniqid());

        $validator = Validator::make(request()->all(), [
            'referrerId'  => 'sometimes',
            'name'        => 'required|string|min:5|max:75',
            'phone'       => 'required|string|min:11|max:13',
            'password'    => 'required|string|min:5|confirmed',
            'email'       => 'required|string|email|max:255|unique:users',
            'terms' => request()->wantsJson() ? 'sometimes' : 'required|string',
        ]);

        if ($validator->fails()) {
            return request()->wantsJson() ? response()->json(['errors' => $validator->errors()], 200) :
            back()->withErrors($validator)->withInput();
        }

        User::create([
            'token'         => $token,
            'email'         => request()->email,
            'number'        => request()->phone,
            'name'          => ucwords(request()->name),
            'password'      => Hash::make(request()->password),
            'referrer'      => User::where('wallet_id', request()->referrerId)->first()->id ?? null,
            'wallet_id'     => strtoupper(Str::random(2)) . rand(1, 10) . strtoupper(Str::random(1)) . rand(1, 100) . strtoupper(Str::random(2)),
        ]);

        $link = url('users/verify/' . request()->email . '/' . $token);

        $subject = 'Email Verification';
        $message = 'Please complete your registration by verifing your email, ';
        $message .= 'follow link below to verify your email ' . $link;


        try {
            Mail::to(request()->email)->send(new RegistrationNotification($message, $subject, $link));
        } catch (\Exception $e) {
            Log::info('Cound not send Registration Email');
        }

        $response = 'Registration Successful, please check your email inbox or email spam ';
        $response .= 'folder to verify email and complete registration.';

        return request()->wantsJson() ? response()->json([ 'status' => true, 'response' => $response]) :back()->with('response', $response);
    }
}
