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
      if( Auth::user()->privilegios == 'Administrador' ){
        $tabla = \DB::table('estado_financiero')
          ->orderBy('created_at','asc')
          ->get();

        $nombreAsociacion = \DB::table('asociaciones')
          ->where('id_asociacion', '=', Auth::user()->asociacion)
          ->get();

        $asociaciones = \DB::table('asociaciones')
          ->get();

        $disponible = \DB::table('estado_financiero')
          ->orderBy('id_finanza', 'desc')
          ->take(1)
          ->get();

          $reporteActa = \DB::select("
            select * from estado_financiero
          ");

          $actonas = '';
          $valores = '';
          for($i=0; $i<count($reporteActa);$i++){
            $actonas = $actonas . '"' . $reporteActa[$i]->fecha.'",';
            $valores = $valores . '"' . $reporteActa[$i]->saldo.'",';
          }


        return view('finanzas')
          ->with('estado', $tabla)
          ->with('asociaciones', $asociaciones)
          ->with('disponible', $disponible)
          ->with('nombreAsociacion', $nombreAsociacion)
          ->with('meses', $actonas)
          ->with('valores', $valores);
      }else if(Auth::user()->privilegios == 'Normal'){
        return 'Sin permisos';
      }

    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $req){
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
  }

  public function edit(Request $req){

  }

  public function destroy(Request $req){
    $idfinan = Finanzas::find($req->idfinanza);
    $idfinan->delete();
    return redirect('/admin/finanzas')->with('mensaje','Registro Eliminado');
  }
}
