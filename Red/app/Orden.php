<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    //Tabla
    protected $table = 'orden_dia';
    protected $fillable = [
      'ref', 'orden_dia', 'descripcion', 'numeroOrden'
    ];
}
