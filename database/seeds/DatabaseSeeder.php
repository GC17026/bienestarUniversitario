<?php

use App\Cargo;
use App\Seccion;
use App\SubSeccion;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $permissions_array = [];
        array_push($permissions_array, Permission::create(['name' => 'crear usuario']));
        array_push($permissions_array, Permission::create(['name' => 'editar usuario']));
        array_push($permissions_array, Permission::create(['name' => 'eliminar usuario']));
        array_push($permissions_array, Permission::create(['name' => 'leer usuario']));

        $superAdminRole = Role::create(['name' => 'Administrador']);
        $superAdminRole->syncPermissions($permissions_array);

        Cargo::create([
            'name' => 'Profesor'
        ]);
        Cargo::create([
            'name' => 'Estudiante'
        ]);
        $userSuperAdmin=User::create([
            'name' => 'Efectivo',
            'lastname' => 'Dinero dinero',
            'cargo_id' => 1,
            'email' => "admin@gmail.com",
            'password'=>Hash::make('admin'),
        ]);

        $userSuperAdmin->assignRole('Administrador');

        Seccion::create([
            'nombre'=>'Seccion'
        ]);
        Seccion::create([
            'nombre'=>'Seccion2'
        ]);
        SubSeccion::create([
            'nombre'=>'Subseccion',
            'seccion_id'=>1
        ]);
        SubSeccion::create([
            'nombre'=>'Subseccion2',
            'seccion_id'=>2
        ]);
    }
}

