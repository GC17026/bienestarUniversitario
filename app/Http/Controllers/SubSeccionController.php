<?php

namespace App\Http\Controllers;

use App\Seccion;
use App\SubSeccion;
use Illuminate\Http\Request;

class SubSeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Subseccion.index');
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
     * @param  \App\SubSeccion  $subSeccion
     * @return \Illuminate\Http\Response
     */
    public function show(SubSeccion $subSeccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubSeccion  $subSeccion
     * @return \Illuminate\Http\Response
     */
    public function edit(SubSeccion $subSeccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubSeccion  $subSeccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubSeccion $subSeccion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubSeccion  $subSeccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubSeccion $subSeccion)
    {
        //
    }
}
