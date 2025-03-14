<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use App\Models\Usuario;
use App\Models\Publicacion;

class ComentarioController extends Controller
{
    public function index()
    {
        $comentarios = Comentario::all();
        return view('comentarios.index', compact('comentarios'));
    }

    public function create()
    {
        $usuarios = Usuario::all();
        $publicaciones = Publicacion::all();
        return view('comentarios.create', compact('usuarios', 'publicaciones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'contenido' => 'required',
            'usuario_id' => 'required|exists:usuarios,id',
            'publicacion_id' => 'required|exists:publicaciones,id',
            'fecha_publicacion' => 'required|date',
        ]);

        Comentario::create($request->all());
        return redirect()->route('comentarios.index');
    }

    public function edit(Comentario $comentario)
    {
        $usuarios = Usuario::all();
        $publicaciones = Publicacion::all();
        return view('comentarios.edit', compact('comentario', 'usuarios', 'publicaciones'));
    }

    public function update(Request $request, Comentario $comentario)
    {
        $request->validate([
            'contenido' => 'required',
            'usuario_id' => 'required|exists:usuarios,id',
            'publicacion_id' => 'required|exists:publicaciones,id',
            'fecha_publicacion' => 'required|date',
        ]);

        $comentario->update($request->except(['_method', '_token']));
        return redirect()->route('comentarios.index');
    }

    public function destroy(Comentario $comentario)
    {
        $comentario->delete();
        return redirect()->route('comentarios.index');
    }
}