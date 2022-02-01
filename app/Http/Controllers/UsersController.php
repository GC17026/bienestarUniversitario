<?php

namespace App\Http\Controllers;

use App\User;
use App\Cargo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Response;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Bitacora;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Users = User::all();
        //dd($Users[0]->roles->first()->id);
        $cargos = Cargo::all();
        $roles = Role::all();
        return view('users.index', compact('Users', 'cargos', 'roles'));
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
                'email' => 'required|unique:users',
                'name' => 'required',
                'lastname' => 'required',
                'cargo_id' => 'required',
                'phone' => 'required',
                'cellphone' => 'required',
                'password' => 'required|confirmed',
            ]);
            if ($validator->fails()) {
                return Response::json(['error' => $validator->errors()], 400);
            }
            $user = User::create([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'cargo_id' => $request->cargo_id,
                'phone' => $request->phone,
                'cellphone' => $request->cellphone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $role = Role::find($request->role_id);
            $user->assignRole($role);
            Bitacora::create([
                'usuario'=>Auth::user()->name,
                'accion'=>'Creo usuario: '.$user->name.' con numero de id: '.$user->id.' y correo: '.$user->email,
            ]);
            return Response::json(['success' => 'Se ha creado un nuevo usuario'], 200);

        } catch (Exception $e) {
            return Response::json(['errors' => 'Ocurrió un error, no se ha podido guardar el registro en la base de datos'], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:users,email,' . $request->id . ',id',
                'name' => 'required',
                'lastname' => 'required',
                'cargo_id' => 'required',
                'phone' => 'required',
                'cellphone' => 'required',
                'password' => 'confirmed',
            ]);
            if ($validator->fails()) {
                return Response::json(['error' => $validator->errors()], 400);
            }
            $user = User::find($request->id);
            $user->email = $request->email;
            $user->name = $request->name;
            $user->lastname = $request->lastname;
            $user->cargo_id = $request->cargo_id;
            $user->phone = $request->phone;
            $user->cellphone = $request->cellphone;

            $role = Role::find($request->role_id);
            $user->assignRole($role);

            if ($request->password != null) {
                $user->password = Hash::make($request->password);
            }
            $user->save();
            Bitacora::create([
                'usuario'=>Auth::user()->name,
                'accion'=>'Actualizo usuario: '.$user->name.' con numero de id: '.$user->id.' y correo: '.$user->email,
            ]);
            return Response::json(['success' => 'Se ha actualizado un usuario'], 200);
        } catch (Exception $e) {
            return Response::json(['error' => 'Ocurrió un error, no se ha podido guardar el registro en la base de datos'], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            //return($request);
            $user = User::find($request->toDeleteId);
            $user->delete();
            return Response::json(['success' => 'Se ha eliminado un usuario'], 200);
        } catch (Exception $e) {
            return Response::json(['errors' => 'Ocurrió un error, no se ha podido guardar el registro en la base de datos'], 400);
        }
    }
}
