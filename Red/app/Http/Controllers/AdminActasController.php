<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Convocatoria;
use App\Orden;
use App\Acta;

class AdminActasController extends Controller
{
    //
    public function index(){
        $nombreAsociacion = \DB::table('asociaciones')
          ->where('id_asociacion', '=', Auth::user()->asociacion)
          ->get();

        $convocatoriaspendientes = \DB::table('convocatorias')
        ->orderBy('ref')
        ->get();

        $ordendia = \DB::table('orden_dia')
        ->get();

        $actas = \DB::table('actas')
        ->orderBy('ref')
        ->get();

        $cc = \DB::table('convocatorias')->pluck('ref')->toArray();
        $aa = \DB::table('actas')->pluck('ref')->toArray();

        $resultado = array_diff($cc,$aa);
        $numero = count($cc);

        $reporteActa = \DB::select("
          select fecha_creacion, convocatorias.ref, sesion, hora, lugar, ciudad, orden_dia, descripcion, hora_finalizacion
          from convocatorias, actas, orden_dia
          where convocatorias.ref = actas.ref
          and actas.ref = orden_dia.ref
        ");

        $actonas = '';
        $valores = '';
        for($i=0; $i<count($reporteActa);$i++){
          $actonas = $actonas . '"' . $reporteActa[$i]->ref.'",';
          $valores = $valores . '""';
        }
        dd($actonas);

        //dd(substr($aa[0], 0, 4));
        return View('actas')
        ->with('nombreAsociacion', $nombreAsociacion)
        ->with('convocatoriaspendientes', $convocatoriaspendientes)
        ->with('resultado',$resultado)
        ->with('numero',$numero)
        ->with('ordendia', $ordendia)
        ->with('actas', $actas);


    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $req){
      $validator = Validator::make($req->all(), [
        'ref' => 'required',
        'fecha_creacion' => 'required',
        'sesion' => 'required',
        'lugar' => 'required',
        'ciudad' => 'required',
        'hora' => 'required'
      ]);

      if ($validator->fails()) {
        //Quiere decir que no esta correcto
        return redirect('/admin/actas')
                ->withInput()
                ->withErrors($validator);
      }else{
        $entro = false;
        $referencia = \DB::table('convocatorias')
          ->get();

        foreach ($referencia as $r) {
          if($req->ref == $r->ref){
            $entro = true;
          }
        }

        if(!$entro){
          Convocatoria::create([
            'ref'=>$req->ref,
            'fecha_creacion'=>$req->fecha_creacion,
            'sesion'=>$req->sesion,
            'lugar'=>$req->lugar,
            'ciudad'=>$req->ciudad,
            'hora'=>$req->hora
          ]);
          for ($i = 1; $i <= $req->numerodeordenes; $i++) {
            Orden::create([
              'ref'=>$req->ref,
              'orden_dia'=>$req->input('orden' . $i),
              'numeroOrden' => $i
            ]);
          }
          return redirect()->to('/admin/actas')
                  ->with('mensaje','Convocatoria Agregada');
        }else{
          return redirect()->to('/admin/actas')
                  ->with('duplicado','Error al registrar Referencia duplicada');
        }

      }
    }

    public function ordenactas(Request $req){
      $ordenes = \DB::table('orden_dia')
        ->where('ref', '=', $req->ref)
        ->get();
      if ($req->ajax()) {
        return $ordenes;
      }
    }

    public function actasAnio(Request $req){
      $actas = \DB::table('actas')
      ->where('ref', 'like','%'.$req->ref.'%')
      ->orderBy('ref')
      ->get();

      if ($req->ajax()) {
        return $actas;
      }

    }

    public function edit(Request $req){
      Acta::create([
        'ref' => $req->referencia
      ]);
      for ($i = 1;$i < $req->OrdenesDia+1;$i++){
        $orden = Orden::all()
          ->where('ref', '=', $req->referencia)
          ->where('numeroOrden', '=', $req->input('numero' . $i . 'A'))->first();
        $orden->descripcion = $req->input('orden' . $i . 'A');
        $orden->save();
      }
      return redirect()->to('/admin/actas')
        ->with('mensaje','Acta Creada');
    }

    public function destroy(Request $req){
      if($req->Caso == '1'){
        $ref = Convocatoria::find($req->referencia);
        $ref->delete();
        return redirect('/admin/actas')->with('mensaje','Convocatoria Eliminada');
      }else if($req->Caso == '2'){
        if($req->btna == '7'){
          $ref = Acta::find($req->idacta);
          $ref->delete();
          return redirect('/admin/actas')->with('mensaje','Acta Eliminada');
        }else if($req->btna == '8'){
          $ref = Acta::find($req->idacta);
          $ref->delete();
          $ref2 = Convocatoria::find($req->refereacta);
          $ref2->delete();
          return redirect('/admin/actas')->with('mensaje','Acta y Convocatoria Eliminadas');
        }
      }
    }
}
