<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        $roles = Rol::all();
        return view('usuarios.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'email' => 'required|email|unique:usuarios',
            'password' => 'required|min:8',
            'rol_id' => 'required|exists:roles,id',
        ]);

        $usuario = new Usuario();
        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->rol_id = $request->rol_id;
        $usuario->save();

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente.');

        
    }
    public function show(Usuario $usuario)
{
    return view('usuarios.show', compact('usuario'));
}

    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'email' => 'required|email|unique:usuarios,email,' . $usuario->id,
            'password' => 'nullable|min:8',
        ]);

        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;
        if ($request->password) {
            $usuario->password = Hash::make($request->password);
        }
        $usuario->save();

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy(Usuario $usuario)
{
    $usuario->estado = !$usuario->estado; // Invierte el estado
    $usuario->save();

    return redirect()->route('usuarios.index')->with('success', 'El usuario fue eliminado exitosamente.');
}

    public function perfil()
{
    $usuario = auth()->user(); // Obtiene el usuario autenticado
    return view('perfil', compact('usuario'));
}
public function actualizarDescripcion(Request $request)
{
    $usuario = auth()->user(); // Obtiene el usuario autenticado

    $request->validate([
        'descripcion' => 'required',
    ]);

    $usuario->descripcion = $request->descripcion;
    $usuario->save();

    return redirect()->route('perfil')->with('success', 'Descripción actualizada correctamente.');
}
public function actualizarFotoPerfil(Request $request)
{
    $request->validate([
        'foto_perfil' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $usuario = auth()->user();

    $ruta = $request->file('foto_perfil')->store('fotos_perfil', 'public');

    $usuario->foto_perfil = $ruta;
    $usuario->save();

    return redirect()->route('perfil')->with('success', 'Foto de perfil actualizada.');
}
   
}