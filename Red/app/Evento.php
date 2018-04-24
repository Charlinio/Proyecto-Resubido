<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    //Table
    protected $table = 'eventos';
    //Llave primaraia
    protected $primaryKey = 'id_evento';
    protected $fillable = [
      'titulo', 'descripcion', 'fecha_hora', 'lugar','imagen'
    ];
}
