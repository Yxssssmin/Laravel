<?php

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

// ruta para añadir un nuevo producto
Route::post("/registrar-producto", [CrudController::class, "create"])->name("crud.create");

// ruta para modificar un producto
Route::post("/modificar-producto", [CrudController::class, "update"])->name("crud.update");

// ruta para borrar un producto
Route::get("/eliminar-producto-{id}", [CrudController::class, "delete"])->name("crud.delete");


Route::get('/home', [App\Http\Controllers\CrudController::class, 'index'])->name('crud.index');
