<?php

namespace App\Http\Controllers;

use App\DataPlan;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */

    public function index()
    {
        $dataPlans = DataPlan::all()->groupBy('network_id');
        return view('index', compact('dataPlans'));
    }

    public function faq(){
        return view('faq');
    }

    public function contact(){
        return view('contact');
    }

    public function bitcoin(){
        return view('buy-sell');
    }

}
