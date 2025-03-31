<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Publicacion;
use Illuminate\Http\Request;

class PublicacionController extends Controller
{
    public function index(Request $request)
{
    $publicacions = Publicacion::with('usuario', 'categoria')->paginate(10); // Ejemplo con paginación de 10 resultados por página
    return view('publicacion.index', compact('publicacions'));
}
    public function create()
    {
        $categorias = Categoria::all(); // Obtiene todas las categorías de la base de datos
        return view('publicacion.create', compact('categorias'));
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'contenido' => 'required',
            'usuario_id' => 'required|exists:usuarios,id',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        Publicacion::create($request->all());

        return redirect()->route('publicacion.index')->with('success', 'Publicación creada exitosamente.');
    }

    public function show(Publicacion $publicacion)
    {
        return view('publicacion.show', compact('publicacion'));
    }

    public function edit(Publicacion $publicacion)
    {
        return view('publicacion.edit', compact('publicacion'));
    }

    public function update(Request $request, Publicacion $publicacion)
    {
        $request->validate([
            'titulo' => 'required',
            'contenido' => 'required',
            'usuario_id' => 'required|exists:usuarios,id',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $publicacion->update($request->all());

        return redirect()->route('publicacion.index')->with('success', 'Publicación actualizada exitosamente.');
    }

    public function destroy(Publicacion $publicacion)
    {
        $publicacion->delete();

        return redirect()->route('publicacion.index')->with('success', 'Publicación eliminada exitosamente.');
    }
}