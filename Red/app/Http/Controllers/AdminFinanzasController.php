<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Finanzas;
use App\Cuota;
use Illuminate\Support\Facades\Auth;

class AdminFinanzasController extends Controller
{
    //
    public function index(){
      $tabla = \DB::table('estado_financiero')
        ->orderBy('created_at','asc')
        ->get();

      $nombreAsociacion = \DB::table('asociaciones')
        ->where('id_asociacion', '=', Auth::user()->asociacion)
        ->get();

      $asociaciones = \DB::table('asociaciones')
        ->get();

      $cuotas = \DB::table('cuotas')
        ->select('cuotas.*','asociaciones.*')
        ->join('asociaciones', 'cuotas.organizacion', '=', 'asociaciones.id_asociacion')
        ->get();

      $anio = \DB::table('cuotas')
        ->select('anio')
        ->distinct()
        ->get();

      return view('finanzas')
        ->with('estado', $tabla)
        ->with('asociaciones', $asociaciones)
        ->with('anio',$anio)
        ->with('cuotas', $cuotas)
        ->with('nombreAsociacion', $nombreAsociacion);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $req){
      if ($req->Caso == "1") {
        $validator = Validator::make($req->all(), [
          'fecha'=>'required',
          'concepto'=>'required',
          'cantidad'=>'required',
        ]);
        if ($validator->fails()) {
          //Quiere decir que no esta correcto
          return redirect('/admin/finanzas')
                  ->withInput()
                  ->withErrors($validator);
        }else{
          $tabla = \DB::table('estado_financiero')
            ->orderBy('created_at','desc')
            ->take(1)
            ->get();
            $valor = 0;
            foreach ($tabla as $dato) {
              $valor = $dato->saldo;
            }
          if($req->dinero == 'ingresos'){
            Finanzas::create([
              'fecha'=>$req->fecha,
              'concepto'=>$req->concepto,
              'ingreso'=>$req->cantidad,
              'saldo'=> $valor + $req->cantidad
            ]);
          }else{
            if(($valor - $req->cantidad) < 0){
              return redirect()->to('/admin/finanzas')
                      ->with('saldomal','El saldo es insuficiente');
            }else{
              Finanzas::create([
                'fecha'=>$req->fecha,
                'concepto'=>$req->concepto,
                'egreso'=>$req->cantidad,
                'saldo'=> $valor - $req->cantidad
              ]);
            }
        }
      }
        return redirect()->to('/admin/finanzas')
                ->with('mensaje','Registro Agregado');
    }else if($req->Caso == "3"){
      $validator = Validator::make($req->all(), [
        'anioTabla'=>'required'
      ]);
      $tabla = \DB::table('asociaciones')
        ->get();

      if ($validator->fails()) {
        //Quiere decir que no esta correcto
        return redirect('/admin/finanzas')
                ->withInput()
                ->withErrors($validator);
      }else{
        foreach ($tabla as $dato) {
          Cuota::create([
            'organizacion'=>$dato->id_asociacion,
            'anio'=>$req->anioTabla
          ]);
        }

      }
      return redirect()->to('/admin/finanzas')
              ->with('mensaje','Registro Agregado');
    }
  }

  public function edit(Request $req){
      $cuotas = Cuota::find($req->idCuota);
      $cuotas->mes = $req->meses;
      $cuotas->cuota = $req->cantidadCuota;
      $cuotas->save();
      return redirect()->to('/admin/finanzas')
        ->with('mensaje','Cuota Agregada');

  }
}
