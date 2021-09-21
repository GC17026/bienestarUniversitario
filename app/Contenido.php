<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    protected $fillable = [
        'titulo','contenido','urlImg','sub_seccion_id','seccion_id'
    ];
    public function seccion()
    {
        return $this->belongsTo(Seccion::class);
    }
    public function subSeccion()
    {
        return $this->belongsTo(SubSeccion::class);
    }
}
