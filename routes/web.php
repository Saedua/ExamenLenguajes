<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactosController;
use App\Http\Controllers\DirectoriosController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/directorios/mostrar',[DirectoriosController::class, 'mostrar'])->name('directorios.mostrar');

Route::get('/directorios/agregar',[DirectoriosController::class,'vistaAgregar'])->name('directorios.agregar');

Route::get('/directorios/buscar',[DirectoriosController::class,'vistaBuscar'])->name('directorios.buscar');

Route::get('/directorios/ver/{id}',[DirectoriosController::class, 'verContactos'])->name('directorios.contactos');

Route::get('/directorios/eliminar/{id}',[DirectoriosController::class, 'vistaEliminar'])->name('directorios.eliminar');

Route::get('/directorios/destroy/{id}',[DirectoriosController::class, 'destroy'])->name('directorios.destroy');

Route::post('/directorios/agregar/guardar',[DirectoriosController::class,'guardar'])->name('directorios.guardar');

