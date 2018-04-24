<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Evento;
use Illuminate\Support\Facades\Auth;

class AdminEventosController extends Controller
{
    //
    public function index(){
      $registros = \DB::table('eventos')
        ->orderBy('id_evento','desc')
        ->get();

      $nombreAsociacion = \DB::table('asociaciones')
        ->where('id_asociacion', '=', Auth::user()->asociacion)
        ->get();

      return view('eventos')
      ->with('eventos', $registros)
      ->with('nombreAsociacion', $nombreAsociacion);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $req){
      $validator = Validator::make($req->all(), [
        'titulo'=>'required|max:50',
        'descripcion'=>'required',
        'fecha'=>'required',
        'hora'=>'required',
        'lugar'=>'required|max:80',
        'imagen'=>'required|image|mimes:jpeg, png, jpg, gif, svg|max:2048'
      ]);

      if ($validator->fails()) {
        //Quiere decir que no esta correcto
        return redirect('/admin/eventos')
                ->withInput()
                ->withErrors($validator);
      }else{
        $nombreImg = time() . '.' . $req->imagen->getClientOriginalExtension();
        $req->imagen->move(public_path('/img/eventos'), $nombreImg);
        Evento::create([
          'titulo'=>$req->titulo,
          'descripcion'=>$req->descripcion,
          'fecha_hora'=>$req->fecha . " " . $req->hora,
          'lugar'=>$req->lugar,
          'imagen'=>$nombreImg
        ]);
        return redirect()->to('/admin/eventos')
                ->with('mensaje','Evento Agregado');
      }
    }

    public function destroy(Request $req){
      $evento = Evento::find($req->idEliminar);
      if ($evento->imagen != 'default.jpg') {
        if (file_exists(public_path('/img/eventos/' . $evento->imagen))) {
          unlink(public_path('/img/eventos/' . $evento->imagen));
        }
      }
      $evento->delete();
      return redirect('/admin/eventos');
    }

    public function update(Request $req){
      $eventos = Evento::find($req->idEditar);
      $eventos->titulo = $req->titulo_eE;
      $eventos->descripcion = $req->descripcion_eE;
      $eventos->fecha_hora = $req->fecha_eE . " " . $req->hora_eE;
      $eventos->lugar = $req->lugar_eE;
      if ($req->imagen_eE != null) {
        $imgName = time() . '.' . $req->imagen_eE->getClientOriginalExtension();
        $req->imagen_eE->move(public_path('/img/eventos'), $imgName);
        if (file_exists(public_path('/img/eventos/' . $eventos->imagen))) {
            unlink(public_path('/img/eventos/' . $eventos->imagen));
        }
        $eventos->imagen = $imgName;
      }
      $eventos->save();
      return redirect()->to('/admin/eventos')
        ->with('mensaje','Evento Modificado');
    }
}
