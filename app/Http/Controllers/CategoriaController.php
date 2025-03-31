<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\Validator; // Importa Validator

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:255|unique:categorias',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
            ], 422);
        }

        $categoria = Categoria::create($request->all());

        return response()->json([
            'success' => true,
            'id' => $categoria->id,
            'nombre' => $categoria->nombre,
        ]);
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:255|unique:categorias,nombre,' . $categoria->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $categoria->update($request->except(['_method', '_token']));
        return redirect()->route('categorias.index');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index');
    }

    public function createModal()
    {
        return view('categoria.create-modal');
    }
}