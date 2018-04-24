<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acta extends Model
{
    //Id del acta
    protected $primaryKey = 'id_acta';
    //nombre de la tabla
    protected $table = 'actas';
    //campos que se pueden manipular de
    protected $fillable = [
      'ref','hora_finalizacion'
    ];
}
