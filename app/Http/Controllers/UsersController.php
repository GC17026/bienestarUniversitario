<?php

namespace App\Http\Controllers;

use App\User;
use App\Cargo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Response;
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
        $cargos = Cargo::all();
        return view('users.index', compact('Users','cargos'));
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
        try{
            if($request->password==$request->password_confirmation){
                User::create([
                    'name'=>$request->name,
                    'lastname'=>$request->lastname,
                    'cargo_id'=>$request->cargo_id,
                    'phone'=>$request->phone,
                    'cellphone'=>$request->cellphone,
                    'email'=>$request->email,
                    'password'=>Hash::make($request->password),
                ]);
                return Response::json(['success'=>'Se ha creado un nuevo usuario'],200);
            }else{
                return Response::json(['success'=>'No se ha podido crear el nuevo usuario'],400);
            }
        }
        catch(Exception $e){
            return Response::json(['error'=>'Ocurrió un error, no se ha podido guardar el registro en la base de datos'],400);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
