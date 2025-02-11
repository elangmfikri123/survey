<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainDealerController extends Controller
{
    public function dashboard()
    {
        return view('maindealer.dashboard');
    }
}
