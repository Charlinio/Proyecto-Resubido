<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asociacion extends Model
{
    //Nombre de la Tabla
    protected $table = 'asociaciones';
    //Id de la Asociacion
    protected $primaryKey = 'id_asociacion';
    //Campos manipulables
    protected $fillable = [
      'nombre','contacto','correo','descripcion', 'logo', 'web'
    ];

}
