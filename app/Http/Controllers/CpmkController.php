<?php

namespace App\Http\Controllers;

use App\Models\Cpmk;
use App\Models\Mata_kuliah;
use Illuminate\Http\Request;

class CpmkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Mata_kuliah::select('*'))
            ->addIndexColumn()
            ->make(true);
        }
        return view('content.cpmk');
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
     * @param  \App\Models\Cpmk  $cpmk
     * @return \Illuminate\Http\Response
     */
    public function show(Cpmk $cpmk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cpmk  $cpmk
     * @return \Illuminate\Http\Response
     */
    public function edit(Cpmk $cpmk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cpmk  $cpmk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cpmk $cpmk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cpmk  $cpmk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cpmk $cpmk)
    {
        //
    }
}
