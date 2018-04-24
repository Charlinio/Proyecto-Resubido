<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    //Tabla
    protected $table = 'cuotas';
    protected $primaryKey = 'id_cuota';
    protected $fillable = [
      'organizacion', 'mes', 'anio', 'cuota', 'adeudo'
    ];
}
