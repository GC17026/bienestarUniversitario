<?php

namespace App\Http\Controllers;

use App\User;
use App\Cargo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Response;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

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
        $roles=Role::all();
        return view('users.index', compact('Users','cargos','roles'));
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

            $validator=Validator::make($request->all(),[
                'email' => 'required|unique:users',
                'name' => 'required',
                'lastname' => 'required',
                'cargo_id' => 'required',
                'phone' => 'required',
                'cellphone' => 'required',
                'password' => 'required|confirmed',
            ]);
            if ($validator->fails()) {
                return Response::json(['error'=>$validator->errors()],400);
            }
            if($request->password==$request->password_confirmation){
                $user=User::create([
                    'name'=>$request->name,
                    'lastname'=>$request->lastname,
                    'cargo_id'=>$request->cargo_id,
                    'phone'=>$request->phone,
                    'cellphone'=>$request->cellphone,
                    'email'=>$request->email,
                    'password'=>Hash::make($request->password),
                ]);
                $role=Role::find($request->role_id);
                $user->assignRole($role);

                return Response::json(['success'=>'Se ha creado un nuevo usuario'],200);
            }else{
                return Response::json(['success'=>'No se ha podido crear el nuevo usuario'],400);
            }
        }
        catch(Exception $e){
            return Response::json(['errors'=>'Ocurrió un error, no se ha podido guardar el registro en la base de datos'],400);
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
        try{

            $validator=Validator::make($request->all(),[
                'email' => 'required|unique:users',
                'name' => 'required',
                'lastname' => 'required',
                'cargo_id' => 'required',
                'phone' => 'required',
                'cellphone' => 'required',
                'password' => 'required|confirmed',
            ]);
            if ($validator->fails()) {
                return Response::json(['error'=>$validator->messages()->get('*')],400);
            }
            if($request->password==$request->password_confirmation){
                $user=User::create([
                    'name'=>$request->name,
                    'lastname'=>$request->lastname,
                    'cargo_id'=>$request->cargo_id,
                    'phone'=>$request->phone,
                    'cellphone'=>$request->cellphone,
                    'email'=>$request->email,
                    'password'=>Hash::make($request->password),
                ]);
                $role=Role::find($request->role_id);
                $user->assignRole($role);

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
