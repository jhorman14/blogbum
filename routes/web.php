<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('usuarios', UsuarioController::class);
Route::get('/usuarios/{usuario}', [UsuarioController::class, 'show'])->name('usuarios.show');
Route::resource('publicaciones', PublicacionController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('comentarios', ComentarioController::class);

Route::get('/perfil', [UsuarioController::class, 'perfil'])->middleware('auth')->name('perfil');
Route::put('/perfil/descripcion', [UsuarioController::class, 'actualizarDescripcion'])->name('perfil.actualizar_descripcion');
Route::post('/perfil/foto', [UsuarioController::class, 'actualizarFotoPerfil'])->name('perfil.actualizar_foto');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name(name: 'login.submit');

