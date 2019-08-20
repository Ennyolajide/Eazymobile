<?php

namespace App\Http\Controllers;

use App\User;
use App\Bank;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends PaystackController
{
    protected $failureResponse = 'Password update fail';
    protected $errorResponse = 'Inavlid current password';
    protected $successResponse = 'Password updated successfully';

    /**
     * Shows
     */
    public function profileIndex()
    {
        return view('dashboard.profile.index');
    }

    /**
     * Edit/Change user passwordd
     */
    public function editPassword(Request $request)
    {
        //validate Request
        $this->validate(request(), ['password' => 'required|confirmed', 'currentPassword' => 'required']);
        $isValidCurrentPassword = password_verify($request->currentPassword, Auth::user()->password); //Verify current password
        $status = $isValidCurrentPassword ? User::find(Auth::user()->id)->update(['password' => bcrypt($request->password)]) : false; //update password
        $message = $status ? $this->successResponse : ($isValidCurrentPassword ? $this->failureResponse : $this->errorResponse);

        return back()->withNotification($this->clientNotify($message, $status));
    }

    /**
     * Edit/Change user passwordd
     */
    public function editProfile(Request $request)
    {
        //validate Request
        $this->validate(request(), ['name' => 'required|string|min:5|max:35', 'phone' => 'required|string|min:10|max:15']);
        $status = User::find(Auth::user()->id)->update(['name' => $request->name, 'number' => $request->phone]) ? true : false; //update profile info
        $message = $status ? 'successful' : 'failed';

        return back()->withNotification($this->clientNotify('Profile update ' . $message, $status));
    }
}
