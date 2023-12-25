<?php

namespace App\Http\Controllers;

use App\Models\Cpl;
use Illuminate\Http\Request;

class CplController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Cpl::select('*'))
            ->addIndexColumn()
            ->make(true);
        }
        return view('content.cpl');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cpl  $cpl
     * @return \Illuminate\Http\Response
     */
    public function show(Cpl $cpl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cpl  $cpl
     * @return \Illuminate\Http\Response
     */
    public function edit(Cpl $cpl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cpl  $cpl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cpl $cpl)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cpl  $cpl
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cpl $cpl)
    {
        //
    }
}
