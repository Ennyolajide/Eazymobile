<?php

namespace App\Http\Controllers;

use App\User;
use App\Transaction;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboardIndex()
    {
        $transactions = Transaction::where('user_id', Auth::user()->id)
            ->take(10)->latest()->get();
        return view('dashboard.index', compact('transactions'));
    }
}