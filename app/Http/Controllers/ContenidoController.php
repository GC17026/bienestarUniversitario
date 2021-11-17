<?php

namespace App\Http\Controllers;

use App\Contenido;
use Illuminate\Http\Request;
use Response;
use App\Http\Controllers\Throwable;
use App\SubSeccion;
use App\Seccion;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Bitacora;

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

            $validator = Validator::make($request->all(), [
                'titulo' => 'required',
                'contenido' => 'required',
                'foto_contenido' => 'mimetypes:image/jpeg,image/png'
            ]);
            if ($validator->fails()) {
                return Response::json(['error' => $validator->errors()], 400);
            }

            $contenido = new Contenido;
            $contenido->titulo = $request->titulo;
            $contenido->contenido = $request->contenido;
            if ($request->contenidoType == "seccion") {
                if (Count(Seccion::find($request->seccionPadre)->contenidos) < 5) {
                    $contenido->seccion_id = $request->seccionPadre;
                } else {
                    return Response::json(['error' => 'Solamente se pueden agregar 5 contenidos por seccion'], 400);
                }
            } else {
                if (Count(SubSeccion::find($request->seccionPadre)->contenidos) < 5) {
                    $contenido->sub_seccion_id = $request->seccionPadre;
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
            Bitacora::create([
                'usuario' => Auth::user()->name,
                'accion' => 'Creo contenido de seccion: ' . ($request->contenidoType == "seccion" ? $contenido->seccion->nombre : $contenido->subseccion->nombre),
            ]);

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
        try {

            $validator = Validator::make($request->all(), [
                'titulo' => 'required',
                'contenido' => 'required',
                'foto_contenido' => 'mimetypes:image/jpeg,image/png'
            ]);
            if ($validator->fails()) {
                return Response::json(['error' => $validator->errors()], 400);
            }

            $contenido = Contenido::find($request->id);
            if ($request->hasFile('foto_contenido')) {
                if(file_exists(getcwd() . $contenido->urlImg)){
                    unlink(trim(getcwd() . $contenido->urlImg));
                }

                $file = $request->file('foto_contenido');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '1.' . $extension;
                $contenido->urlImg = '/public/uploads/' . $filename;
                $file->move('public/uploads/', $filename);
            }
            $contenido->titulo = $request->titulo;
            $contenido->contenido = $request->contenido;
            $contenido->save();
            Bitacora::create([
                'usuario' => Auth::user()->name,
                'accion' => 'Actualizó contenido de ' . $contenido->seccion != null ? 'seccion: ' . $contenido->seccion->nombre : 'subseccion: ' . $contenido->subseccion->nombre,
            ]);

            return Response::json(['success' => 'Se ha actualizado un contenido'], 200);
        } catch (Exception $e) {
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
        try {
            $contenido = Contenido::find($request->toDeleteId);
            if ($contenido->urlImg != null) {
                if(file_exists(getcwd() . $contenido->urlImg)){
                    unlink(trim(getcwd() . $contenido->urlImg));
                }
            }
            $contenido->delete();
            Bitacora::create([
                'usuario' => Auth::user()->name,
                'accion' => 'Eliminó contenido de la ' . $contenido->seccion != null ? 'seccion: ' . $contenido->seccion->nombre : 'subseccion: ' . $contenido->subseccion->nombre,
            ]);

            return Response::json(['success' => 'Se ha eliminado el contenido con éxito'], 200);
        } catch (Exception $e) {
            return Response::json(['error' => 'Ocurrió un error, es posible que el formato de la imagen no sea permitido'], 400);
        }
    }
}
