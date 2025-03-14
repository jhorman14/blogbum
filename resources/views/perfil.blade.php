@extends('layouts.usuarios')

@section('title', 'Mi Perfil')

@section('content')
    <h1>Mi Perfil</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <p><strong>Nombre:</strong> {{ $usuario->nombre }}</p>
    <p><strong>Email:</strong> {{ $usuario->email }}</p>

    <form action="{{ route('perfil.actualizar_foto') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="foto_perfil">
    <button type="submit">Subir Foto de Perfil</button>
</form>
@if ($usuario->foto_perfil)
    <img src="{{ Storage::url($usuario->foto_perfil) }}" alt="Foto de Perfil">
@else
    <p>No hay foto de perfil.</p>
@endif

    <form action="{{ route('perfil.actualizar_descripcion') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control">{{ $usuario->descripcion }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Descripción</button>
    </form>
@endsection