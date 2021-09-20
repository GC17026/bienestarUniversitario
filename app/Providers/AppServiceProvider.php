<?php

namespace App\Providers;

use App\Aviso;
use View;
use App\Seccion;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $secciones = Seccion::All();
        $avisos=Aviso::All();
        //var should be global to all blade files, app.blade.php is main templ
        View::share ( 'secciones', $secciones );
        View::share ( 'avisos', $avisos );
    }
}
