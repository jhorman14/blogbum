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
Route::resource('publicacions', PublicacionController::class);
Route::get('/publicacions/create', [PublicacionController::class, 'create'])->name('publicacion.create');
Route::post('/publicacions', [PublicacionController::class, 'store'])->name('publicacion.store');
Route::get('/publicacions', [PublicacionController::class, 'index'])->name('publicacion.index');
Route::get('/publicacions/{publicacion}', [PublicacionController::class, 'show'])->name('publicacion.show');
Route::get('/publicacions/{publicacion}/edit', [PublicacionController::class, 'edit'])->name('publicacion.edit');
Route::delete('/publicacions/{publicacion}', [PublicacionController::class, 'destroy'])->name('publicacion.destroy');
Route::resource('categorias', CategoriaController::class);
Route::resource('comentarios', ComentarioController::class);

Route::get('/perfil', [UsuarioController::class, 'perfil'])->middleware('auth')->name('perfil');
Route::put('/perfil/descripcion', [UsuarioController::class, 'actualizarDescripcion'])->name('perfil.actualizar_descripcion');
Route::post('/perfil/foto', [UsuarioController::class, 'actualizarFotoPerfil'])->name('perfil.actualizar_foto');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/categorias/create-modal', [CategoriaController::class, 'createModal'])->name('categoria.create-modal');