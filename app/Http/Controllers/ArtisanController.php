<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ArtisanController extends Controller
{
    //

    public function recache(){
        Artisan::call('clear-compiled');
        Artisan::call('optimize:clear');
        Artisan::call('optimize');

        return "Cache Cleared, Config Cache, Route Cache, View Cached";
    }
}
