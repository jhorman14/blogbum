<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $fillable = ['titulo', 'contenido', 'usuario_id', 'categoria_id'];
    public $timestamps = true;

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