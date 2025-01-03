<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\DirectivoController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\LicenciaturaController;
use App\Http\Controllers\SemestreController;
use App\Http\Controllers\CuestionarioController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\ProgramaController;
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

Route::get('/directivos',[DirectivoController::class,'index']);
Route::post('/directivos/agregarDirectivo',[DirectivoController::class,'create']);
Route::get('/directivos/borrar/{id}', [DirectivoController::class, 'destroy']);
Route::get('/directivos/editar/{id}',[DirectivoController::class, 'edit']);
Route::post('/directivos/editar/{id}', [DirectivoController::class, 'update']);

Route::get('/cuestionarios',[CuestionarioController::class,'index']);
Route::post('/cuestionarios/consulta', [CuestionarioController::class, 'consulta']);

Route::get('/programas',[ProgramaController::class,'index']);
Route::post('/programas/agregarPrograma',[ProgramaController::class,'create']);
Route::get('/programas/borrar/{id}', [ProgramaController::class, 'destroy']);
Route::get('/programas/editar/{id}',[ProgramaController::class, 'edit']);
Route::post('/programas/editar/{id}', [ProgramaController::class, 'update']);

Route::get('/alumnos',[AlumnoController::class,'index']);
Route::post('/alumnos/agregarAlumno', [AlumnoController::class, 'add']);

Route::get('/materias',[MateriaController::class,'index']);
Route::post('/materias/agregarMateria', [MateriaController::class, 'add']);
Route::get('/materias/editar/{id}',[MateriaController::class, 'edit']);
Route::post('/materias/editar/{id}', [MateriaController::class, 'update']);
