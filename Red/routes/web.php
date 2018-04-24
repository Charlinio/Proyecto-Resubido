<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Use Carbon\Carbon;

Route::get('/', 'IndexController@Index');
Route::group(['prefix'=>'admin','as'=>'admin.'],function(){
  Route::get('/', 'AdminInicioController@index');
  Route::get('/actas','AdminActasController@index');
  Route::post('/actas/ordenactas','AdminActasController@ordenactas');
  Route::get('/eventos','AdminEventosController@index');
  Route::get('/usuarios', 'AdminUsuariosController@index');
  Route::post('/usuarios/buscar','AdminUsuariosController@buscar');
  Route::get('/publicar', 'AdminPublicarController@index');
  Route::get('/finanzas', 'AdminFinanzasController@index');
  Route::get('/cuotas', 'AdminCuotasController@index');
  Route::get('/asociaciones', 'AdminAsociacionesController@index');
  Route::get('/reportes', 'AdminAsociacionesController@index');


  Route::resource('admin','AdminInicioController');
  Route::resource('actas','AdminActasController');
  Route::resource('eventos','AdminEventosController');
  Route::resource('usuarios','AdminUsuariosController');
  Route::resource('publicar','AdminPublicarController');
  Route::resource('finanzas','AdminFinanzasController');
  Route::resource('cuotas','AdminCuotasController');
  Route::resource('asociaciones','AdminAsociacionesController');
  Route::resource('reportes','AdminReportesController');
});

Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
