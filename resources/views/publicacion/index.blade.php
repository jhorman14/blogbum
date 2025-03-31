@extends('layouts.usuarios')

@section('template_title')
    Publicaciones
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Publicaciones') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('publicacion.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                    {{ __('Crear Nueva') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="row">
                            @foreach ($publicacions as $publicacion)
                                <div class="col-md-8 offset-md-2 mb-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <img src="{{ $publicacion->usuario->foto_perfil ?? 'https://via.placeholder.com/50' }}" alt="Foto de perfil" class="rounded-circle mr-3" width="50">
                                                <div>
                                                    <h5 class="card-title mb-0">{{ $publicacion->usuario->name }}</h5>
                                                    <small class="text-muted">{{ $publicacion->created_at->diffForHumans() }}</small>
                                                </div>
                                            </div>
                                            <h4 class="card-title">{{ $publicacion->titulo }}</h4>
                                            <p class="card-text">{{ $publicacion->contenido }}</p>
                                            @if ($publicacion->categoria)
                                                <p class="card-text"><small class="text-muted">Categoría: {{ $publicacion->categoria->nombre }}</small></p>
                                            @endif
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <a href="#" class="btn btn-sm btn-light"><i class="far fa-thumbs-up"></i> Me gusta</a>
                                                    <a href="#" class="btn btn-sm btn-light"><i class="far fa-comment"></i> Comentar</a>
                                                    <a href="#" class="btn btn-sm btn-light"><i class="far fa-share-square"></i> Compartir</a>
                                                </div>
                                                <div>
                                                    <a class="btn btn-sm btn-primary" href="{{ route('publicacion.show', $publicacion->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('publicacion.edit', $publicacion->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    <form action="{{ route('publicacion.destroy', $publicacion->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('¿Estás seguro de eliminar?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                {!! $publicacions->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection