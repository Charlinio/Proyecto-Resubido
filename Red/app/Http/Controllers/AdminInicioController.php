<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminInicioController extends Controller
{
    //
    public function index(){
      $nombreAsociacion = \DB::table('asociaciones')
        ->where('id_asociacion', '=', Auth::user()->asociacion)
        ->get();

        $cuotas = \DB::table('cuot')
          ->select('cuot.*','asociaciones.*')
          ->join('asociaciones', 'cuot.organizacion', '=', 'asociaciones.id_asociacion')
          ->get();

          $meshoy = Date('n');

          $reporteActa = \DB::select("
            select * from estado_financiero
          ");

          $actonas = '';
          $valores = '';
          for($i=0; $i<count($reporteActa);$i++){
            $actonas = $actonas . '"' . $reporteActa[$i]->fecha.'",';
            $valores = $valores . $reporteActa[$i]->saldo.',';
          }

      return view('plantilla')
      ->with('cuotas', $cuotas)
      ->with('nombreAsociacion', $nombreAsociacion)
      ->with('messhoy', $meshoy)
      ->with('meses', $actonas)
      ->with('valores', $valores);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
