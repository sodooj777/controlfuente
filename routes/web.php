<?php

use Illuminate\Support\Facades\Route;
use App\Exports\SolicitudsExport;
use App\Exports\ProductsExport;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\SearchsController;
use App\Http\Controllers\GerenciaController;
use App\Http\Controllers\ConsultarController;
use Maatwebsite\Excel\Facades\Excel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


/*Route::get('/nuevo', function () {
    return view('users.index');
});*/

//Route::get('/solicitud', 'App\Http\Controllers\SolicitudController@index');

Route::resource('solicitud','App\Http\Controllers\SolicitudController');

Route::resource('search','App\Http\Controllers\SearchsController'); 

Route::resource('release','App\Http\Controllers\ReleaseController');

Route::resource('desarrollo','App\Http\Controllers\GerenciaController');

Route::resource('consulta','App\Http\Controllers\ConsultarController');

Route::resource('administracion','App\Http\Controllers\AdministracionController');

Route::resource('usuarios','App\Http\Controllers\UsuariosController');



Route::get('/excel', function () {
    return Excel::download(new SolicitudsExport, 'reportes.xlsx');
});


/* Route::get('/excel1', function () {
    return Excel::download(new ProductsExport, 'reportes_fech.xlsx');
});  */

Route::get('/excel1',[SolicitudController::class,'export']);

Route::get('/excel2',[SolicitudController::class,'fech']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
