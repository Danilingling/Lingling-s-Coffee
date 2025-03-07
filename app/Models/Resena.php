<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resena extends Model
{
    use HasFactory;

    protected $fillable = ['producto_id', 'nombre_cliente', 'comentario', 'calificacion'];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
