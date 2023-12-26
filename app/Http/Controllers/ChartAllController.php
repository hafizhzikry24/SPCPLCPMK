<?php

namespace App\Http\Controllers;

use App\Charts\ChartAll;
use Illuminate\Http\Request;

class ChartAllController extends Controller
{
    public function index(ChartAll $chart)
    {
        return view('content.rekap', ['chart' => $chart->build()]);
    }
}
