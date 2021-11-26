<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RecursoController;
use App\Http\Controllers\EncargadoController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\TareaController;

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
    return redirect(url('/proyectos') );
});

Route::get('/hola', function () {
    return 'hola como estas?';
});

Route::get('/proyectos/reports', [RecursoController::class, 'indexReport']);
Route::resource('recursos', RecursoController::class);
Route::resource('encargados', EncargadoController::class);
Route::resource('proyectos', ProyectoController::class);




Route::get('/proyectos/{proyecto}/tareas/create', [TareaController::class, 'create']);
Route::post('/proyectos/{proyecto}/tareas', [TareaController::class, 'store']);
Route::get('/tareas/{tarea}', [TareaController::class, 'show']);
Route::get('/proyectos/{proyecto}/tareas/{tarea}/edit', [TareaController::class, 'edit']);
Route::put('/proyectos/{proyecto}/tareas/{tarea}', [TareaController::class, 'update']);
Route::delete('/proyectos/{proyecto}/tareas/{tarea}', [TareaController::class, 'destroy']);

Route::get('/tareas/{tarea}/recursos/create', [TareaController::class, 'createRecurso']);
Route::post('/tareas/{tarea}/recursos', [TareaController::class, 'storeRecurso']);
Route::get('/tareas/{tarea}/recursos/{recurso}/edit', [TareaController::class, 'editRecurso']);
Route::delete('/tareas/{tarea}/recursos/{recurso}', [TareaController::class, 'destroyRecurso']);