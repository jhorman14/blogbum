@extends('layouts.app')

@section('title', 'Detalles del Usuario')

@section('content')
    <h1>{{ $usuario->nombre }}</h1>

    <p><strong>Email:</strong> {{ $usuario->email }}</p>
    <p><strong>Rol:</strong> {{ $usuario->rol->nombre }}</p>
    <p><strong>Estado:</strong> {{ $usuario->estado ? 'Activo' : 'Inactivo' }}</p>
    <p><strong>Descripción:</strong> {{ $usuario->descripcion }}</p>

    <a href="{{ route('usuarios.edit', $usuario->id) }}">Editar Perfil</a>
    <a href="{{ route('usuarios.cambiar_password', $usuario->id) }}">Cambiar Contraseña</a>
    <a href="{{ route('usuarios.publicaciones', parameters: $usuario->id) }}">Ver Publicaciones</a>
@endsection