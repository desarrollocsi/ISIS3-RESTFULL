<?php

namespace App\Http\Controllers;

use App\Models\Cie10;
use Illuminate\Http\Request;

class Cie10Controller extends Controller
{
    private $cie10;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Cie10 $cie10)
    {
        $this->cie10 = $cie10;
    }
    public function index(Request $request)
    {
        //
        return response()->json($this->cie10->filtroDiagnostico($request), 200);
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
     * @param  \App\Models\Cie10  $cie10
     * @return \Illuminate\Http\Response
     */
    public function show(Cie10 $cie10)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cie10  $cie10
     * @return \Illuminate\Http\Response
     */
    public function edit(Cie10 $cie10)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cie10  $cie10
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cie10 $cie10)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cie10  $cie10
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cie10 $cie10)
    {
        //
    }
}
