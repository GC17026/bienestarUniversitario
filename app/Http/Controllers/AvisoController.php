<?php

namespace App\Http\Controllers;

use App\Aviso;
use App\Bitacora;
use Illuminate\Http\Request;
use Response;
use App\Http\Controllers\Throwable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
                $validator = Validator::make($request->all(), [
                    'titulo' => 'required',
                    'contenido' => 'required',
                ]);
                if ($validator->fails()) {
                    return Response::json(['error' => $validator->errors()], 400);
                }

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

                Bitacora::create([
                    'usuario'=>Auth::user()->name,
                    'accion'=>'Creo aviso, id: '.$aviso->id.'titulo: '.$aviso->titulo,
                ]);

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
            $validator = Validator::make($request->all(), [
                'titulo' => 'required',
                'contenido' => 'required',
            ]);
            if ($validator->fails()) {
                return Response::json(['error' => $validator->errors()], 400);
            }

            $aviso=Aviso::findOrFail($request->id);
            $aviso->update([
                'titulo'=>$request->titulo,
                'contenido'=>$request->contenido
            ]);

            Bitacora::create([
                'usuario'=>Auth::user()->name,
                'accion'=>'Actualizó aviso, id: '.$aviso->id.'titulo: '.$aviso->titulo,
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
            $aviso=Aviso::findOrFail($request->toDeleteId);
            $aviso->delete();

            Bitacora::create([
                'usuario'=>Auth::user()->name,
                'accion'=>'Eliminó aviso, titulo: '.$aviso->titulo,
            ]);

            return Response::json(['success'=>'Se ha eliminado la sección correctamente'],200);
        }
        catch(Exception $e){
            return Response::json(['error'=>'Ocurrió un error. no se pudo completar el proceso'],400);
        }
    }
}
