<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	 Route::get('map', function () {return view('pages.maps');})->name('map');
	 Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	Route::get('pacientes', function () {return view('pages.pacientes');})->name('pacientes');
	Route::get('pacientes_detalle', function () {return view('pages.pacientes_detalle');})->name('pacientes_detalle');
	Route::get('nuevo_paciente', function () {return view('pages.nuevo_paciente');})->name('nuevo_paciente');
	Route::get('ordenes_servicio', function () {return view('pages.ordenes_servicio');})->name('ordenes_servicio');
	Route::get('crear_orden_servicio', function () {return view('pages.crear_orden_servicio');})->name('crear_orden_servicio');
	Route::get('medicos', function () {return view('pages.medicos');})->name('medicos');
	Route::get('areas', function () {return view('pages.areas');})->name('areas');
	Route::get('detalle_area', function () {return view('pages.areas_detalle');})->name('detalle_area');
	Route::get('detalle_area_laboratorio', function () {return view('pages.detalle_area_laboratorio');})->name('detalle_area_laboratorio');

	Route::get('finanzas', function () {return view('pages.finanzas');})->name('finanzas');
	Route::get('usuarios', function () {return view('pages.usuarios');})->name('usuarios');
	Route::get('ordenes_servicio_detalle', function () {return view('pages.ordenes_servicio_detalle');})->name('ordenes_servicio_detalle');


});

