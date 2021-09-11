<?php

use App\Cargo;
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
    }
}

