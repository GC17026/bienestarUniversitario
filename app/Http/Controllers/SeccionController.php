<?php

namespace App\Http\Controllers;

use App\Seccion;
use App\SubSeccion;
use App\Contenido;
use Exception;
use Illuminate\Http\Request;
use Response;
use App\Http\Controllers\Throwable;
class SeccionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $secciones = Seccion::all();
        return view('seccion.index', compact('secciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $seccion = Seccion::create([
                'nombre'=>$request->nombre,
                'icono'=>$request->icono,
            ]);
            return Response::json(['success'=>'Se ha creado una nueva sección'],200);
        }
        catch(Exception $e){
            return Response::json(['error'=>'Ocurrió un error, es posible que ya exista una sección llamada igual'],400);
        }

        //return view('seccion.index', compact('secciones'))->with('mensaje', 'Se ha registrado una sección nueva');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function show(Seccion $seccion)
    {
        return view('Seccion.show', compact('seccion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function edit(Seccion $seccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        return Response::json(['success'=>'prueba'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seccion $seccion)
    {
        //
    }
}
