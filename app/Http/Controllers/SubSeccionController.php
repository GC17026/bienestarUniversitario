<?php

namespace App\Http\Controllers;

use App\Seccion;
use App\SubSeccion;
use App\Contenido;
use Illuminate\Http\Request;
use Response;
use App\Http\Controllers\Throwable;
use Illuminate\Support\Facades\Auth;
use App\Bitacora;

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
            $subseccion=SubSeccion::create([
                'nombre'=>$request->nombre,
                'icono'=>$request->icono,
                'seccion_id'=>$request->seccionPadre
            ]);

            Bitacora::create([
                'usuario'=>Auth::user()->name,
                'accion'=>'Creo una subsección: '.$subseccion->nombre.' perteneciente a la seccion: '.$subseccion->seccion->nombre,
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
            $subseccion=SubSeccion::findOrFail($request->id);
            $subseccion->update([
                'nombre'=>$request->nombre,
                'icono'=>$request->icono
            ]);

            Bitacora::create([
                'usuario'=>Auth::user()->name,
                'accion'=>'Actualizó una subsección: '.$subseccion->nombre.', perteneciente a la seccion: '.$subseccion->seccion->nombre,
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
            $subseccion=SubSeccion::findOrFail($request->toDeleteId);
            $subseccion->delete();

            Bitacora::create([
                'usuario'=>Auth::user()->name,
                'accion'=>'Eliminó una subsección: '.$subseccion->nombre.' junto a sus contenidos, perteneciente a la seccion: '.$subseccion->seccion->nombre,
            ]);

            return Response::json(['success'=>'Se ha eliminado la subsección correctamente'],200);
        }
        catch(Exception $e){
            return Response::json(['error'=>'Ocurrió un error. no se pudo completar el proceso'],400);
        }
    }
}
