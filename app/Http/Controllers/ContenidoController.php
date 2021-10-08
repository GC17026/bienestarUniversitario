<?php

namespace App\Http\Controllers;

use App\Contenido;
use Illuminate\Http\Request;
use Response;
use App\Http\Controllers\Throwable;
use App\SubSeccion;
use App\Seccion;
use Illuminate\Support\Facades\Storage;

class ContenidoController extends Controller
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
            $contenido = new Contenido;
            $contenido->titulo = $request->titulo;
            $contenido->contenido = $request->contenido;
            if ($request->contenidoType == "seccion") {
                $contenido->seccion_id = $request->seccionPadre;
                if (Count(Seccion::find($request->seccionPadre)->contenidos) < 5) {
                    $contenido->seccion_id = $request->seccionPadre;
                } else {
                    return Response::json(['error' => 'Solamente se pueden agregar 5 contenidos por seccion'], 400);
                }
            } else {
                $contenido->sub_seccion_id = $request->seccionPadre;
                if (Count(SubSeccion::find($request->seccionPadre)->contenidos) < 5) {
                    $contenido->seccion_id = $request->seccionPadre;
                } else {
                    return Response::json(['error' => 'Solamente se pueden agregar 5 contenidos por subseccion'], 400);
                }
            }

            if ($request->hasFile('foto_contenido')) {
                $file = $request->file('foto_contenido');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '1.' . $extension;
                $contenido->urlImg = '/public/uploads/' . $filename;
                $file->move('public/uploads/', $filename);
            }
            $contenido->save();
            return Response::json(['success' => 'Se ha agregado un nuevo contenido'], 200);
        } catch (Exception $e) {
            return Response::json(['error' => 'Ocurrió un error, es posible que el formato de la imagen no sea permitido'], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contenido  $contenido
     * @return \Illuminate\Http\Response
     */
    public function show(Contenido $contenido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contenido  $contenido
     * @return \Illuminate\Http\Response
     */
    public function edit(Contenido $contenido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contenido  $contenido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try{
            $contenido = Contenido::find($request->id);
            if ($request->hasFile('foto_contenido')) {
                unlink(trim(getcwd() . $contenido->urlImg));
                $file = $request->file('foto_contenido');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '1.' . $extension;
                $contenido->urlImg = '/public/uploads/' . $filename;
                $file->move('public/uploads/', $filename);
            }
            $contenido->titulo=$request->titulo;
            $contenido->contenido=$request->contenido;
            $contenido->save();
            return Response::json(['success' => 'Se ha actualizado un contenido'], 200);
        }
        catch (Exception $e) {
            return Response::json(['error' => 'Ocurrió un error, es posible que el formato de la imagen no sea permitido'], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contenido  $contenido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try{
            $contenido = Contenido::find($request->toDeleteId);
            unlink(trim(getcwd() . $contenido->urlImg));
            $contenido->delete();
            return Response::json(['success' => 'Se ha eliminado el contenido con éxito'], 200);
        }
        catch (Exception $e) {
            return Response::json(['error' => 'Ocurrió un error, es posible que el formato de la imagen no sea permitido'], 400);
        }
    }
}
