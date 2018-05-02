<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Cuotaa;
use Illuminate\Support\Facades\Auth;

class AdminCuotassController extends Controller
{
    //
    public function index(){
      if( Auth::user()->privilegios == 'Administrador' ){
        $nombreAsociacion = \DB::table('asociaciones')
          ->where('id_asociacion', '=', Auth::user()->asociacion)
          ->get();

        $Asociaciones = \DB::table('asociaciones')
          ->get();

          $cuotas = \DB::table('cuot')
            ->select('cuot.*','asociaciones.*')
            ->join('asociaciones', 'cuot.organizacion', '=', 'asociaciones.id_asociacion')
            ->get();

          $anio = \DB::table('cuot')
            ->select('anio')
            ->distinct()
            ->get();

          $meshoy = Date('n');

          return View('cuotas')
            ->with('anio',$anio)
            ->with('cuotas', $cuotas)
            ->with('nombreAsociacion', $nombreAsociacion)
            ->with('asociaciones', $Asociaciones)
            ->with('messhoy', $meshoy);
      }else if(Auth::user()->privilegios == 'Normal'){
        return 'Sin permisos';
      }

    }

    public function store(Request $req){
      if ($req->Caso == '1') {
        Cuotaa::create([
          'anio'=>$req->anioAsociation,
          'organizacion' => $req->asociation
        ]);
        return redirect()->to('/admin/cuotas')
                ->with('mensaje','Asociacion Agregada');
      }else if($req->Caso == '2'){
        $validator = Validator::make($req->all(), [
          'anioTabla'=>'required|max:4'
        ]);
        if ($validator->fails()) {
          //Quiere decir que no esta correcto
          return redirect('/admin/cuotas')
                  ->withInput()
                  ->withErrors($validator);
        }else{
            $Asociacion = \DB::table('asociaciones')
            ->get();
            foreach($Asociacion as $a){
              Cuotaa::create([
                'anio'=>$req->anioTabla,
                'organizacion' => $a->id_asociacion
              ]);
            }
        }
        return redirect()->to('/admin/cuotas')
                ->with('mensaje','Tabla Creada');
      }
    }

    public function adeudos(Request $req){
      $ad = 0;
      switch ($req->mes) {
        case '1':
          $adeudofinal = Cuotaa::find($req->id);
          $adeudofinal->adeudo += 50;
          $adeudofinal->enero = 0;
          $adeudofinal->save();
          return $adeudofinal->adeudo;
          break;
        case '2':
          $adeudofinal = Cuotaa::find($req->id);
          $adeudofinal->adeudo += 50;
          $adeudofinal->febrero = 0;
          $adeudofinal->save();
          return $adeudofinal->adeudo;
          break;
        case '3':
          $adeudofinal = Cuotaa::find($req->id);
          $adeudofinal->adeudo += 50;
          $adeudofinal->marzo = 0;
          $adeudofinal->save();
          return $adeudofinal->adeudo;
          break;
        case '4':
          $adeudofinal = Cuotaa::find($req->id);
          $adeudofinal->adeudo += 50;
          $adeudofinal->abril = 0;
          $adeudofinal->save();
          return $adeudofinal->adeudo;
          break;
        case '5':
          $adeudofinal = Cuotaa::find($req->id);
          $adeudofinal->adeudo += 50;
          $adeudofinal->mayo = 0;
          $adeudofinal->save();
          return $adeudofinal->adeudo;
          break;
        case '6':
          $adeudofinal = Cuotaa::find($req->id);
          $adeudofinal->adeudo += 50;
          $adeudofinal->junio = 0;
          $adeudofinal->save();
          return $adeudofinal->adeudo;
          break;
        case '7':
          $adeudofinal = Cuotaa::find($req->id);
          $adeudofinal->adeudo += 50;
          $adeudofinal->julio = 0;
          $adeudofinal->save();
          return $adeudofinal->adeudo;
          break;
        case '8':
          $adeudofinal = Cuotaa::find($req->id);
          $adeudofinal->adeudo += 50;
          $adeudofinal->agosto = 0;
          $adeudofinal->save();
          return $adeudofinal->adeudo;
          break;
        case '9':
          $adeudofinal = Cuotaa::find($req->id);
          $adeudofinal->adeudo += 50;
          $adeudofinal->septiembre = 0;
          $adeudofinal->save();
          return $adeudofinal->adeudo;
          break;
        case '10':
          $adeudofinal = Cuotaa::find($req->id);
          $adeudofinal->adeudo += 50;
          $adeudofinal->octubre = 0;
          $adeudofinal->save();
          return $adeudofinal->adeudo;
          break;
        case '11':
          $adeudofinal = Cuotaa::find($req->id);
          $adeudofinal->adeudo += 50;
          $adeudofinal->noviembre = 0;
          $adeudofinal->save();
          return $adeudofinal->adeudo;
          break;
        case '12':
          $adeudofinal = Cuotaa::find($req->id);
          $adeudofinal->adeudo += 50;
          $adeudofinal->diciembre = 0;
          $adeudofinal->save();
          return $adeudofinal->adeudo;
          break;
      }
    }

    public function edit(Request $req){
      $tabla = Cuotaa::find($req->idCuota);
      if($req->meses == '01'){
        $tabla->enero = $req->cantidadCuota;
        $tabla->adeudo -= $req->cantidadCuota;
      }else if($req->meses == '02'){
        $tabla->febrero = $req->cantidadCuota;
        $tabla->adeudo -= $req->cantidadCuota;
      }else if($req->meses == '03'){
        $tabla->marzo = $req->cantidadCuota;
        $tabla->adeudo -= $req->cantidadCuota;
      }else if($req->meses == '04'){
        $tabla->abril = $req->cantidadCuota;
        $tabla->adeudo -= $req->cantidadCuota;
      }else if($req->meses == '05'){
        $tabla->mayo = $req->cantidadCuota;
        $tabla->adeudo -= $req->cantidadCuota;
      }else if($req->meses == '06'){
        $tabla->junio = $req->cantidadCuota;
        $tabla->adeudo -= $req->cantidadCuota;
      }else if($req->meses == '07'){
        $tabla->julio = $req->cantidadCuota;
        $tabla->adeudo -= $req->cantidadCuota;
      }else if($req->meses == '08'){
        $tabla->agosto = $req->cantidadCuota;
        $tabla->adeudo -= $req->cantidadCuota;
      }else if($req->meses == '09'){
        $tabla->septiembre = $req->cantidadCuota;
        $tabla->adeudo -= $req->cantidadCuota;
      }else if($req->meses == '10'){
        $tabla->octubre = $req->cantidadCuota;
        $tabla->adeudo -= $req->cantidadCuota;
      }else if($req->meses == '11'){
        $tabla->noviembre = $req->cantidadCuota;
        $tabla->adeudo -= $req->cantidadCuota;
      }else if($req->meses == '12'){
        $tabla->diciembre = $req->cantidadCuota;
        $tabla->adeudo -= $req->cantidadCuota;
      }
      $tabla->save();
      return redirect()->to('/admin/cuotas')
              ->with('mensaje','Cuota Actualizada');
    }
}
