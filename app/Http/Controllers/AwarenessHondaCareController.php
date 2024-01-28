<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AwarenessHondaCareController extends Controller
{
    public function indexhc()
    {
        return view('admin.awareneshc-table');
    }
}
