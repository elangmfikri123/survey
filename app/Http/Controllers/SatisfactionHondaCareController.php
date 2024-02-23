<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SatisfactionHondaCareController extends Controller
{
    public function indexcsat()
    {
        return view('admin.csathc-table');
    }
}
