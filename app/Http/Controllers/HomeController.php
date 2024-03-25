<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        if (auth()->user()->is_admin) {

            return view('admin.dashboard');
        } else {

            return view('user.dashboard');
        }
    }
}
