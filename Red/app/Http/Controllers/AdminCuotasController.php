<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Finanzas;
use App\Cuota;
use Illuminate\Support\Facades\Auth;

class AdminCuotasController extends Controller
{
    //
    public function index(){
      $nombreAsociacion = \DB::table('asociaciones')
        ->where('id_asociacion', '=', Auth::user()->asociacion)
        ->get();

      $cuotas = \DB::table('cuotas')
        ->select('cuotas.*','asociaciones.*')
        ->join('asociaciones', 'cuotas.organizacion', '=', 'asociaciones.id_asociacion')
        ->get();

      $anio = \DB::table('cuotas')
        ->select('anio')
        ->distinct()
        ->get();

      return View('cuotas')
      ->with('anio',$anio)
      ->with('cuotas', $cuotas)
      ->with('nombreAsociacion', $nombreAsociacion);
    }
}
