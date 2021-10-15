<?php

namespace App\Http\Controllers;

use App\Seccion;
use App\SubSeccion;
use App\Contenido;
use Exception;
use Illuminate\Http\Request;
use Response;
use App\Http\Controllers\Throwable;
use Illuminate\Support\Facades\Auth;
use App\Bitacora;
use Illuminate\Support\Facades\Validator;

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
            $validator = Validator::make($request->all(), [
                'nombre' => 'required|unique:seccions',
                'icono' => 'required',
            ]);
            if ($validator->fails()) {
                return Response::json(['error' => $validator->errors()], 400);
            }

            $seccion=Seccion::create([
                'nombre'=>$request->nombre,
                'icono'=>$request->icono,
            ]);

            Bitacora::create([
                'usuario'=>Auth::user()->name,
                'accion'=>'Creo una sección: '.$seccion->nombre,
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
        try{
            $validator = Validator::make($request->all(), [
                'nombre' => 'required|unique:seccions,nombre,' . $request->id . ',id',
                'icono' => 'required',
            ]);
            if ($validator->fails()) {
                return Response::json(['error' => $validator->errors()], 400);
            }

            $seccion=Seccion::findOrFail($request->id);
            $seccion->update([
                'nombre'=>$request->nombre,
                'icono'=>$request->icono
            ]);

            Bitacora::create([
                'usuario'=>Auth::user()->name,
                'accion'=>'Actualizó una sección: '.$seccion->nombre,
            ]);

            return Response::json(['success'=>'Se ha actualizado la sección correctamente'],200);
        }
        catch(Exception $e){
            return Response::json(['error'=>'Ocurrió un error, puede que otra sección ya tenga este nombre'],400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try{
            $seccion=Seccion::findOrFail($request->toDeleteId);
            $seccion->delete();

            Bitacora::create([
                'usuario'=>Auth::user()->name,
                'accion'=>'Eliminó una sección: '.$seccion->nombre.' junto todas sus subsecciones y contenidos',
            ]);

            return Response::json(['success'=>'Se ha eliminado la sección correctamente'],200);
        }
        catch(Exception $e){
            return Response::json(['error'=>'Ocurrió un error. no se pudo completar el proceso'],400);
        }
    }
}
