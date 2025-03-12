<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function publicaciones()
{
    return $this->hasMany(Publicacion::class);
}

}
