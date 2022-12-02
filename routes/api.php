<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/datauser', [AuthController::class, 'dataUser'])->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->group(function(){
    
    Route::post('/logout', [AuthController::class, 'logout']);

});

//Route::get('/users', [UserController::class, 'index']);


//Route::get('/users2', 'App\Http\Controllers\User\UserController@index');

Route::ApiResource('users', 'App\Http\Controllers\User\UserController');
Route::ApiResource('perfiles', 'App\Http\Controllers\User\PerfileController');

Route::ApiResource('pucs', 'App\Http\Controllers\Contabilidad\PucController');

Route::ApiResource('empresas', 'App\Http\Controllers\Empresa\EmpresaController');
Route::ApiResource('provedores', 'App\Http\Controllers\Empresa\ProveedoreController');
Route::ApiResource('clientes', 'App\Http\Controllers\Empresa\ClienteController');
Route::ApiResource('personas', 'App\Http\Controllers\Empresa\PersonaController');
Route::ApiResource('impuestos', 'App\Http\Controllers\Empresa\ImpuestoController');
Route::ApiResource('eventos', 'App\Http\Controllers\Empresa\EventoController');
Route::ApiResource('tipoeventos', 'App\Http\Controllers\Empresa\TipoeventoController');
Route::ApiResource('estodoalertas', 'App\Http\Controllers\Empresa\EstadoalertaController');
Route::ApiResource('alertas', 'App\Http\Controllers\Empresa\AlertaController');
Route::ApiResource('auditorias', 'App\Http\Controllers\Empresa\AuditoriaController', ['only'=> ['index','show']]);


//test
//Route::get('reportetrm/{company}', 'Report\CompanyOrderProviderController@reporte');//->name('usersStoreRole');


