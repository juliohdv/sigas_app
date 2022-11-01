<?php

use Illuminate\Support\Facades\Route;

//Controladores
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CooperativaController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\SolicitudController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function(){
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('cooperativas', CooperativaController::class);
    Route::resource('paises', PaisController::class);
    Route::resource('solicitudes', SolicitudController::class);
    Route::get('editarEstado/idSolicitud/{idSolicitud}/nuevoEstado/{nuevoEstado}', 'App\Http\Controllers\SolicitudController@editarEstado')->name('editarEstado');
    Route::get('verSolicitud/idSolicitud/{idSolicitud}', 'App\Http\Controllers\SolicitudController@verSolicitud')->name('verSolicitud');
    
});
