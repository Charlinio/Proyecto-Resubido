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

      return view('plantilla')
      ->with('nombreAsociacion', $nombreAsociacion);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
