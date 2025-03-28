<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'imagen',
        'categoria_id'
    ];

    public function resenas()
    {
        return $this->hasMany(Resena::class, 'producto_id');
    }

    public function tickets() {
        return $this->belongsToMany(Ticket::class, 'ticket_producto')->withPivot('cantidad', 'subtotal');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }


}


