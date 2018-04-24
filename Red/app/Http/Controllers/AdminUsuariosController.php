<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use Illuminate\Support\Facades\Auth;

class AdminUsuariosController extends Controller
{
    //
    public function index(){
      $registros = \DB::table('users')
        ->select('users.*','asociaciones.*')
        ->join('asociaciones', 'users.asociacion', '=', 'asociaciones.id_asociacion')
        ->orderBy('id','asc')
        //->take(10)
        ->get();

      $nombreAsociacion = \DB::table('asociaciones')
        ->where('id_asociacion', '=', Auth::user()->asociacion)
        ->get();

      $asociaciones = \DB::table('asociaciones')
        ->get();

      return view('usuarios')
        ->with('usuarios', $registros)
        ->with('asociaciones', $asociaciones)
        ->with('nombreAsociacion', $nombreAsociacion);

    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $req){
      $validator = Validator::make($req->all(), [
        'nombre'=>'required|max:255',
        'correo'=>'required|email',
        'p1'=>'required|max:255',
        'p2'=>'required|max:255|same:p1',
        'nivel'=>'required',
        'aso'=>'required'
      ]);
      if ($validator->fails()) {
        //Quiere decir que no esta correcto
        return redirect('/admin/usuarios')
                ->withInput()
                ->withErrors($validator);
      }else{
        User::create([
          'name'=>$req->nombre,
          'email'=>$req->correo,
          'password'=>bcrypt($req->p1),
          'privilegios'=>$req->nivel,
          'asociacion'=>$req->aso
        ]);
        return redirect()->to('/admin/usuarios')
                ->with('mensaje','Usuario Agregado');
      }
    }

    public function destroy(Request $req){
      $usuario = User::find($req->idEliminar);
      $usuario->delete();
      return redirect('/admin/usuarios')->with('mensaje','Usuario Eliminado');
    }

    public function edit(Request $req){
      $usuario = User::find($req->idEditar);
      $usuario->name = $req->nombreE;
      $usuario->email = $req->emailE;
      $usuario->asociacion = $req->asociacionE;
      if ($req->pE != "") {
        $usuario->password = bcrypt($req->pE);
      }
      $usuario->privilegios = $req->nivelE;
      $usuario->save();
      return redirect()->to('/admin/usuarios')
        ->with('mensaje','Usuario Modificado');
    }

    public function buscar(Request $req){
      $registros = \DB::table('users')
        ->select("name","email","privilegios","id","nombre","logo")
        ->join('asociaciones', 'users.asociacion', '=', 'asociaciones.id_asociacion')
        ->orwhere('name', 'like', '%'.$req->nombre.'%')
        ->orWhere('email', 'like', '%'.$req->nombre.'%')
        ->get();
      if ($req->ajax()) {
        return json_encode($registros);
      }
    }
}
