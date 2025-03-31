@extends('layouts.usuarios')

@section('template_title')
    Crear Publicación
@endsection

@section('content')
    <div class="container">
        <h1>Crear Publicación</h1>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('publicacion.store') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="usuario_id" value="{{ Auth::id() }}">

                            <div class="mb-3">
                                <label for="titulo" class="form-label">Título</label>
                                <input type="text" name="titulo" id="titulo" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="contenido" class="form-label">Contenido</label>
                                <textarea name="contenido" id="contenido" class="form-control" rows="5" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="categoria_id" class="form-label">Categoría</label>
                                <div class="input-group">
                                    <select name="categoria_id" id="categoria_id" class="form-select" required>
                                        <option value="">Selecciona una categoría</option>
                                        @foreach ($categorias as $categoria)
                                            <option value="{{ $categoria->id }}">{{ $categoria->nombre_categoria }}</option>
                                        @endforeach
                                    </select>
                                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#createCategoryModal">
                                        Crear Categoría
                                    </button>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Crear Publicación</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="createCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createCategoryModalLabel">Crear Nueva Categoría</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body" id="categoryModalBody">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#createCategoryModal').on('show.bs.modal', function() {
                $.get('\{\{ route(\'categoria.create-modal\') \}\}', function(data) {
                    $('#categoryModalBody').html(data);
                });
            });
        });
    </script>
@endsection