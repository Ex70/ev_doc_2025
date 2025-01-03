<?php

use App\Http\Controllers\DocenteController;
use App\Http\Controllers\LicenciaturaController;
use App\Http\Controllers\SemestreController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/licenciaturas',[LicenciaturaController::class,'index']);
Route::post('/licenciaturas/agregarLicenciatura',[LicenciaturaController::class,'create']);
Route::get('/licenciaturas/borrar/{id}', [LicenciaturaController::class, 'destroy']);
Route::get('/licenciaturas/editar/{id}',[LicenciaturaController::class, 'edit']);
Route::post('/licenciaturas/editar/{id}', [LicenciaturaController::class, 'update']);

Route::get('/semestres',[SemestreController::class,'index']);
Route::post('/semestres/agregarSemestre',[SemestreController::class,'create']);
Route::get('/semestres/borrar/{id}', [SemestreController::class, 'destroy']);
Route::get('/semestres/editar/{id}',[SemestreController::class, 'edit']);
Route::post('/semestres/editar/{id}', [SemestreController::class, 'update']);

Route::get('/docentes',[DocenteController::class,'index']);
Route::post('/docentes/agregarDocente',[DocenteController::class,'create']);
Route::get('/docentes/borrar/{id}', [DocenteController::class, 'destroy']);
Route::get('/docentes/editar/{id}',[DocenteController::class, 'edit']);
Route::post('/docentes/editar/{id}', [DocenteController::class, 'update']);
