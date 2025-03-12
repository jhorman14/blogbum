<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    public function usuario()
{
    return $this->belongsTo(Usuario::class);
}

public function categoria()
{
    return $this->belongsTo(Categoria::class);
}

public function comentarios()
{
    return $this->hasMany(Comentario::class);
}
}
