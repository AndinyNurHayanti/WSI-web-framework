<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request,
App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //Acara 8
    public function index()
    {
        return view('backend.dashboard');
    }
}
