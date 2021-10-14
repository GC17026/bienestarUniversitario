<?php

use App\Aviso;
use App\Cargo;
use App\Contenido;
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
        array_push($permissions_array, Permission::create(['name' => 'crear aviso']));
        array_push($permissions_array, Permission::create(['name' => 'editar aviso']));
        array_push($permissions_array, Permission::create(['name' => 'eliminar aviso']));
        array_push($permissions_array, Permission::create(['name' => 'leer aviso']));

        array_push($permissions_array, Permission::create(['name' => 'crear seccion']));
        array_push($permissions_array, Permission::create(['name' => 'editar seccion']));
        array_push($permissions_array, Permission::create(['name' => 'eliminar seccion']));
        array_push($permissions_array, Permission::create(['name' => 'leer seccion']));

        array_push($permissions_array, Permission::create(['name' => 'crear subseccion']));
        array_push($permissions_array, Permission::create(['name' => 'editar subseccion']));
        array_push($permissions_array, Permission::create(['name' => 'eliminar subseccion']));
        array_push($permissions_array, Permission::create(['name' => 'leer subseccion']));

        array_push($permissions_array, Permission::create(['name' => 'crear contenido']));
        array_push($permissions_array, Permission::create(['name' => 'editar contenido']));
        array_push($permissions_array, Permission::create(['name' => 'eliminar contenido']));
        array_push($permissions_array, Permission::create(['name' => 'leer contenido']));

        $Editor = Role::create(['name' => 'Editor']);//Cuando se crea nuevo usuario, sin importar su cargo elegido: Estudiante/docente/externo a la institución/personal de bienestar
        $Editor->syncPermissions($permissions_array);

        array_push($permissions_array, Permission::create(['name' => 'leer bitacora']));


        array_push($permissions_array, Permission::create(['name' => 'crear usuario']));
        array_push($permissions_array, Permission::create(['name' => 'editar usuario']));
        array_push($permissions_array, Permission::create(['name' => 'eliminar usuario']));
        array_push($permissions_array, Permission::create(['name' => 'leer usuario']));

        $superAdminRole = Role::create(['name' => 'Administrador']);
        $superAdminRole->syncPermissions($permissions_array);

        $consultor = Role::create(['name' => 'Consultor']);

        Cargo::create([
            'name' => 'Profesor'
        ]);
        Cargo::create([
            'name' => 'Estudiante'
        ]);
        Cargo::create([
            'name' => 'Externo a la institución'
        ]);
        Cargo::create([
            'name' => 'Personal de bienestar'
        ]);
        $userSuperAdmin=User::create([
            'name' => 'Administrador',
            'lastname' => 'Dinero dinero',
            'cargo_id' => 1,
            'email' => "admin@gmail.com",
            'password'=>Hash::make('admin'),
        ]);
        $userSuperAdmin->assignRole('Administrador');

        $userSuperEditor=User::create([
            'name' => 'Editor',
            'lastname' => 'Dinero dinero',
            'cargo_id' => 1,
            'email' => "editor@gmail.com",
            'password'=>Hash::make('admin'),
        ]);
        $userSuperEditor->assignRole('Editor');

        $userSuperConsultor=User::create([
            'name' => 'Consultor',
            'lastname' => 'Dinero dinero',
            'cargo_id' => 1,
            'email' => "consultor@gmail.com",
            'password'=>Hash::make('admin'),
        ]);
        $userSuperConsultor->assignRole('Consultor');

        Seccion::create([
            'nombre'=>'Inicio',
            'icono'=>'fa fa-user'
        ]);
        //secciones
        Seccion::create([
            'nombre'=>'Seccion',
            'icono'=>'fa fa-user'
        ]);
        Seccion::create([
            'nombre'=>'Seccion2',
            'icono'=>'far fa-address-book'
        ]);
        //subsecciones
        SubSeccion::create([
            'nombre'=>'Subseccion',
            'icono'=>'fab fa-algolia',
            'seccion_id'=>2
        ]);
        SubSeccion::create([
            'nombre'=>'Subseccion2',
            'icono'=>'fab fa-amazon',
            'seccion_id'=>3
        ]);
        //contenido seccion
        Contenido::create([
            'titulo'=>'Bienvenidos a Bienestar Universitario',
            'contenido'=>'La unidad de Bienestar Universitario les da la Bienvenida a su Sitio Web.

            En este Sitio encontrarÁs toda la información referente a los servicios y actividades que Bienestar Universitario realiza, nuestra MisiÓn, Visión, Objetivos y Valores, asi como los Servicios MÉdicos que se encuentran disponibles en nuestras instalaciones.

            Para obtener todos los beneficios que Bienestar Universitario te brinda, puedes registrarte dando click AQUI , Es completamente Gratis y sencillo!!!',
            'urlImg'=>'https://revistaeducacionvirtual.com/wp-content/uploads/2016/10/estudiante-feliz-730x486.jpg',
            'seccion_id'=>1
        ]);
        Contenido::create([
            'titulo'=>'Bienvenidos a Bienestar Universitario',
            'contenido'=>'ASPIRANTE NUEVO INGRESO
            Para obtener certificado de buena salud en el centro de salud universitario, deben realizarse los cuatro exámenes de laboratorio.

            Hemograma

            Serología (VDRL)

            Examen de heces

            Examen de orina

            Los exámenes tienen máximo dos meses de vigencia.
            Además se presentará  RADIOGRAFIA DE TORAX (Facultad de medicina). El certificado de salud es prerrequisito para la inscripción en cada facultad.
            Incluye consulta médica y los cuatro exámenes de laboratorios.
            Se pagara en la colecturía de la secretaria de bienestar universitario.',
            'urlImg'=>'https://st.depositphotos.com/2024219/4320/i/950/depositphotos_43206081-stock-photo-young-student-thinking-over-pink.jpg',
            'seccion_id'=>1
        ]);
        Contenido::create([
            'titulo'=>'Titulo 2',
            'contenido'=>'Lorem ipsum dolor sit amet, sectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enLorem ipsum dolor sit amet, sectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim adim ad',
            'urlImg'=>'http://washingtonhispanic.com/portal/wp-content/uploads/2018/05/Foto-2-Visas-estudiantes.jpg',
            'seccion_id'=>2
        ]);
        Contenido::create([
            'titulo'=>'Titulo 3',
            'contenido'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'urlImg'=>'https://st3.depositphotos.com/3591429/13527/i/1600/depositphotos_135272718-stock-photo-young-diverse-students.jpg',
            'seccion_id'=>3
        ]);
        //contenido subseccion
        Contenido::create([
            'titulo'=>'Subseccion subtitulo',
            'contenido'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'urlImg'=>'https://st.depositphotos.com/2024219/4320/i/950/depositphotos_43206081-stock-photo-young-student-thinking-over-pink.jpg',
            'sub_seccion_id'=>1
        ]);
        Contenido::create([
            'titulo'=>'Subseccion subtitulo 2',
            'contenido'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'urlImg'=>'https://st3.depositphotos.com/3591429/13527/i/1600/depositphotos_135272718-stock-photo-young-diverse-students.jpg',
            'sub_seccion_id'=>2
        ]);
        Contenido::create([
            'titulo'=>'Subseccion subtitulo 3',
            'contenido'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'urlImg'=>'https://st.depositphotos.com/2024219/4320/i/950/depositphotos_43206081-stock-photo-young-student-thinking-over-pink.jpg',
            'sub_seccion_id'=>2
        ]);

        //Avisos

        Aviso::create([
            'titulo'=>'Aviso',
            'contenido'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'urlImg'=>'/assets/salud.png'
        ]);
        Aviso::create([
            'titulo'=>'Aviso 2',
            'contenido'=>'do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'urlImg'=>'/assets/bob.png'
        ]);
        Aviso::create([
            'titulo'=>'Aviso 3',
            'contenido'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'urlImg'=>'/assets/user.png'
        ]);
        Aviso::create([
            'titulo'=>'Aviso 4',
            'contenido'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'urlImg'=>'/assets/salud.png'
        ]);
        Aviso::create([
            'titulo'=>'Aviso 5',
            'contenido'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'urlImg'=>'/assets/salud.png'
        ]);
    }
}

