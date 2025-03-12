<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Miembro;
use Illuminate\Support\Facades\Hash;

class MiembroController extends Controller
{
    public function index()
    {
        $usuarios = Miembro::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'email' => 'required|email|unique:usuarios',
            'password' => 'required|min:8',
        ]);

        $usuario = new Miembro();
        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->save();

        return redirect()->route('usuarios.index');
    }

    public function edit(Miembro $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, Miembro $usuario)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'email' => 'required|email|unique:miembros,email,' . $usuario->id,
            'password' => 'nullable|min:8',
        ]);

        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;
        if ($request->password) {
            $usuario->password = Hash::make($request->password);
        }
        $usuario->save();

        return redirect()->route('usuarios.index');
    }

    public function destroy(Miembro $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index');
    }
}