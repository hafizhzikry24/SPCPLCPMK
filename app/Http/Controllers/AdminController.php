<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view()
    {
        $isAdmin = auth()->user()->isAdmin(); // Adjust this based on your logic

        return view('content.admin', compact('isAdmin'));
    }
}
