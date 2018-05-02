<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Convocatoria extends Model
{
    //Tabla
    protected $table = 'convocatorias';
    protected $primaryKey = 'ref';
    protected $fillable = [
      'ref','fecha_creacion', 'hora', 'lugar', 'sesion', 'ciudad'
    ];
}
