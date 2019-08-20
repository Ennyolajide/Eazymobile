<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordResetController extends Controller
{
    //

    public function index()
    {
        $app = $this->getAppDetails();

        return view('users/reset', compact('app'));
    }
}
