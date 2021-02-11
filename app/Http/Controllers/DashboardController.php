<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('general');
    }

    public function index(Request $request){
        return view('pages.dashboard');
    }
}
