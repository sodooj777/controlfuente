<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


/*Route::get('/nuevo', function () {
    return view('users.index');
});*/

//Route::get('/solicitud', 'App\Http\Controllers\SolicitudController@index');

Route::resource('solicitud','App\Http\Controllers\SolicitudController');


Route::resource('release','App\Http\Controllers\ReleaseController');

Route::resource('administracion','App\Http\Controllers\AdministracionController');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
