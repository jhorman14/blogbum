<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\MiembroController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('usuarios', MiembroController::class);
Route::resource('publicaciones', PublicacionController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('comentarios', ComentarioController::class);