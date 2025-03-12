// resources/views/publicaciones/index.blade.php
@foreach ($publicaciones as $publicacion)
    {{ $publicacion->titulo }}
    {{ $publicacion->usuario->nombre }}
    {{ $publicacion->categoria->nombre }}
@endforeach