<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuotaa extends Model
{
    //Tabla
        protected $table = 'cuot';
        protected $primaryKey = 'id_cuota';
        protected $fillable = [
          'organizacion', 'enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre', 'anio', 'adeudo'
        ];
}
