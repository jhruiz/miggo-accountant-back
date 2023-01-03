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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/datauser', [AuthController::class, 'dataUser'])->middleware('auth:sanctum');


//***************************************************************************************************** */
// Email verificacion de usuario nuevo y si cambia el correo, reenvio de verificacion, link de recuperacion de contraseña
//receteo de contraseña, email basico 

Route::get('email/verify/{id}', 'App\Http\Controllers\VerificationController@verify')->name('verification.verify'); 
Route::get('email/resend/{id}', 'App\Http\Controllers\VerificationController@resend')->name('verification.resend');
Route::post('sendPasswordResetLink', 'App\Http\Controllers\PasswordResetRequestController@sendEmail');
Route::post('resetPassword', 'App\Http\Controllers\ChangePasswordController@passwordResetProcess');

Route::post('/send-email', 'App\Http\Controllers\MailController@sendEmailBasic');//basico maillable

//******************************************************************************************************* */

Route::middleware(['auth:sanctum'])->group(function(){
    
    //*************************************RUTAS DE USUARIOS PROTEGIDAS*********** */
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::ApiResource('empresas.users','App\Http\Controllers\Empresa\EmpresaUserController', ['only'=> ['index','update','destroy']]);
    Route::ApiResource('users', 'App\Http\Controllers\User\UserController');
    Route::get('estatus/{user}', 'App\Http\Controllers\User\UserController@estatus'); 
    Route::ApiResource('perfiles', 'App\Http\Controllers\User\PerfileController');

    //*************************************RUTAS DE EMPRESA*********** */

    // Perfiles
    Route::ApiResource('empresas.perfiles', 'App\Http\Controllers\Empresa\EmpresaPerfileController', ['only'=> ['index','store']]);


    //*************************************RUTAS DE PERSONA*********** */

    Route::ApiResource('empleados', 'App\Http\Controllers\Persona\EmpleadoController');
    Route::ApiResource('clientes', 'App\Http\Controllers\Persona\ClienteController');
    Route::ApiResource('provedores', 'App\Http\Controllers\Persona\ProveedoreController');
    Route::ApiResource('personas', 'App\Http\Controllers\Persona\PersonaController');
    Route::ApiResource('tipoidentificaciones', 'App\Http\Controllers\Persona\TipoidentificacioneController', ['only'=> ['index','show']]);


    //*************************************RUTAS DE PAIS*********** */

    Route::ApiResource('paises.departamentos','App\Http\Controllers\Pais\PaisDepartamentoController', ['only'=> ['index']]);
    Route::ApiResource('departamentos.ciudades','App\Http\Controllers\Pais\DepartamentoCiudadeController', ['only'=> ['index']]);
    Route::ApiResource('ciudades', 'App\Http\Controllers\Pais\CiudadeController', ['only'=> ['show']]); 

    //******************************************VEHICULOS*************************************** */

    Route::ApiResource('empresas.vehiculos', 'App\Http\Controllers\Empresa\EmpresaVehiculoController', ['only'=> ['index']]);
    Route::ApiResource('vehiculos', 'App\Http\Controllers\Vehiculo\VehiculoController', ['only'=> ['store','show','update','destroy']]);
    Route::ApiResource('marcavehiculos', 'App\Http\Controllers\Vehiculo\MarcavehiculoController');
    Route::ApiResource('tipovehiculos', 'App\Http\Controllers\Vehiculo\TipovehiculoController');
    Route::ApiResource('referencias', 'App\Http\Controllers\Vehiculo\ReferenciaController');
    Route::ApiResource('partevehiculos', 'App\Http\Controllers\Vehiculo\PartevehiculoController');
    Route::ApiResource('tipovehiculos.partevehiculos', 'App\Http\Controllers\Vehiculo\TipovehiculoPartevehiculoController');
    Route::get('alltipovehiculopartes', 'App\Http\Controllers\Vehiculo\TipovehiculoPartevehiculoController@alltipovehiculopartes'); 

    //***************************************CODIGO CIIU******************************************************************************************** */

    Route::ApiResource('ciiusecciones', 'App\Http\Controllers\Ciiu\CiiuseccioneController', ['only'=> ['index','show']]);
    Route::ApiResource('ciiusecciones.ciiudiviciones', 'App\Http\Controllers\Ciiu\CiiuseccioneDivicioneController', ['only'=> ['index']]);
    Route::ApiResource('ciiudivisiones', 'App\Http\Controllers\Ciiu\CiiudivisioneController', ['only'=> ['index','show']]);
    Route::ApiResource('ciiudivisiones.ciiugrupos', 'App\Http\Controllers\Ciiu\CiiudivisioneGrupoController', ['only'=> ['index']]);
    Route::ApiResource('ciiugrupos', 'App\Http\Controllers\Ciiu\CiiugrupoController', ['only'=> ['index','show']]);
    Route::ApiResource('ciiugrupos.ciiuclases', 'App\Http\Controllers\Ciiu\CiiugrupoClaseController', ['only'=> ['index']]);
    Route::ApiResource('ciiuclases', 'App\Http\Controllers\Ciiu\CiiuclaseController', ['only'=> ['index','show']]);

    //***************************************CUENTAS PUC******************************************************************************************** */
    
    Route::ApiResource('pucs', 'App\Http\Controllers\Puc\PucController');
    Route::get('allpucs/{puc}', 'App\Http\Controllers\Puc\PucController@allpucs'); 
    
    //********************************************************************************* */

});



//Route::get('/users', [UserController::class, 'index']);


//Route::get('/users2', 'App\Http\Controllers\User\UserController@index');



Route::ApiResource('empresas', 'App\Http\Controllers\Empresa\EmpresaController');
Route::ApiResource('impuestos', 'App\Http\Controllers\Empresa\ImpuestoController');
Route::ApiResource('eventos', 'App\Http\Controllers\Empresa\EventoController');
Route::ApiResource('tipoeventos', 'App\Http\Controllers\Empresa\TipoeventoController');
Route::ApiResource('estodoalertas', 'App\Http\Controllers\Empresa\EstadoalertaController');
Route::ApiResource('alertas', 'App\Http\Controllers\Empresa\AlertaController');
Route::ApiResource('auditorias', 'App\Http\Controllers\Empresa\AuditoriaController', ['only'=> ['index','show']]);
Route::ApiResource('cloudmenus', 'App\Http\Controllers\Cloudmenu\CloudmenuController', ['only'=> ['index']]);






//****************************************************************************************************************************** */



