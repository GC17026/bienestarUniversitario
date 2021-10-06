<?php

namespace App\Http\Controllers;

use App\Seccion;
use App\SubSeccion;
use App\Contenido;
use Illuminate\Http\Request;
use Response;
use App\Http\Controllers\Throwable;

class SubSeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('Subseccion.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('Subseccion.create');
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
            SubSeccion::create([
                'nombre'=>$request->nombre,
                'icono'=>$request->icono,
                'seccion_id'=>$request->seccionPadre
            ]);
            return Response::json(['success'=>'Se ha creado una nueva subsección'],200);
        }
        catch(Exception $e){
            return Response::json(['error'=>'Ocurrió un error, es posible que ya exista una subsección llamada igual'],400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubSeccion  $subSeccion
     * @return \Illuminate\Http\Response
     */
    public function show(SubSeccion $subSeccion)
    {
        return view('Subseccion.show',compact('subSeccion'));
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
    public function update(Request $request)
    {
        try{
            $seccion=SubSeccion::findOrFail($request->id);
            $seccion->update([
                'nombre'=>$request->nombre,
                'icono'=>$request->icono
            ]);
            return Response::json(['success'=>'Se ha actualizado la subsección correctamente'],200);
        }
        catch(Exception $e){
            return Response::json(['error'=>'Ocurrió un error, puede que otra sección ya tenga este nombre'],400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubSeccion  $subSeccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try{
            $seccion=SubSeccion::findOrFail($request->toDeleteId);
            $seccion->delete();
            return Response::json(['success'=>'Se ha eliminado la subsección correctamente'],200);
        }
        catch(Exception $e){
            return Response::json(['error'=>'Ocurrió un error. no se pudo completar el proceso'],400);
        }
    }
}
