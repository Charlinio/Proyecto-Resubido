<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminReportesController extends Controller
{
    //
    public function index(){
      $nombreAsociacion = \DB::table('asociaciones')
        ->where('id_asociacion', '=', Auth::user()->asociacion)
        ->get();

      return View('reportes')
      ->with('nombreAsociacion', $nombreAsociacion)
      ->with('nombre', 'EQUIPOS DE FUTBOL');
    }
}
