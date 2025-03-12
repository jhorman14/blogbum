<?php

namespace App\Http\Controllers;
use App\Models\Publicacion;
use App\Models\Usuario;
use App\Models\Categoria;



use Illuminate\Http\Request;

class PublicacionController extends Controller
{
    public function index()
{
    $publicaciones = Publicacion::all();
    return view('publicaciones.index', compact('publicaciones'));
}

public function create()
{
    $usuarios = Usuario::all();
    $categorias = Categoria::all();
    return view('publicaciones.create', compact('usuarios', 'categorias'));
}

public function store(Request $request)
{
    Publicacion::create($request->all());
    return redirect()->route('publicaciones.index');
}

public function edit(Publicacion $publicacion)
{
    $usuarios = Usuario::all();
    $categorias = Categoria::all();
    return view('publicaciones.edit', compact('publicacion', 'usuarios', 'categorias'));
}

public function update(Request $request, Publicacion $publicacion)
{
    $publicacion->update($request->all());
    return redirect()->route('publicaciones.index');
}

public function destroy(Publicacion $publicacion)
{
    $publicacion->delete();
    return redirect()->route('publicaciones.index');
}
}
