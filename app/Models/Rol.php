<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    public function usuario()
{
    return $this->hasMany(Rol::class);
}
}
