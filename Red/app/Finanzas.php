<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finanzas extends Model
{
    //Tabla
    protected $table = 'estado_financiero';
    protected $primaryKey = 'id_finanza';
    protected $fillable = [
      'fecha', 'concepto', 'ingreso', 'egreso', 'saldo'
    ];
}
