<?php

namespace App\Http\Controllers;

use App\Aviso;
use Illuminate\Http\Request;
use Response;
use App\Http\Controllers\Throwable;
class AvisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        try {
            if(Count(Aviso::all())<5)
            {
                $aviso = new Aviso;
                $aviso->titulo = $request->titulo;
                $aviso->contenido = $request->contenido;

                if ($request->hasFile('foto_contenido')) {
                    $file = $request->file('foto_contenido');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '1.' . $extension;
                    $aviso->urlImg = '/public/uploads/' . $filename;
                    $file->move('public/uploads/', $filename);
                }
                $aviso->save();
                return Response::json(['success' => 'Se ha agregado un nuevo aviso'], 200);
            }else{
                return Response::json(['error' => 'Solamente se pueden agregar 5 avisos'], 400);
            }

        } catch (Exception $e) {
            return Response::json(['error' => 'Ocurrió un error, es posible que el formato de la imagen no sea permitido'], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aviso  $aviso
     * @return \Illuminate\Http\Response
     */
    public function show(Aviso $aviso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aviso  $aviso
     * @return \Illuminate\Http\Response
     */
    public function edit(Aviso $aviso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aviso  $aviso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try{
            $seccion=Aviso::findOrFail($request->id);
            $seccion->update([
                'titulo'=>$request->titulo,
                'contenido'=>$request->contenido
            ]);
            return Response::json(['success'=>'Se ha actualizado el aviso correctamente'],200);
        }
        catch(Exception $e){
            return Response::json(['error'=>'Ocurrió un error.'],400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aviso  $aviso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try{
            $seccion=Aviso::findOrFail($request->toDeleteId);
            $seccion->delete();
            return Response::json(['success'=>'Se ha eliminado la sección correctamente'],200);
        }
        catch(Exception $e){
            return Response::json(['error'=>'Ocurrió un error. no se pudo completar el proceso'],400);
        }
    }
}
