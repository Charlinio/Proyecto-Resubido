<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicar extends Model
{
  //Tabla
  protected $table = 'publicar';
  protected $primaryKey = 'id_publicacion';
  protected $fillable = [
    'usuario', 'publicacion'
  ];
}
