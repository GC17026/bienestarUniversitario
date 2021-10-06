<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubSeccion extends Model
{
    protected $fillable = [
        'nombre','icono','seccion_id'
    ];
    public function seccion()
    {
        return $this->belongsTo(Seccion::class);
    }
    public function contenidos()
    {
        return $this->hasMany(Contenido::class);
    }
}
