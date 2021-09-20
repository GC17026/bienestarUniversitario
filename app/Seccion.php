<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    protected $fillable = [
        'nombre','icono'
    ];
    public function subSecciones()
    {
        return $this->hasMany(SubSeccion::class);
    }
    public function contenidos()
    {
        return $this->hasMany(Contenido::class);
    }
}
