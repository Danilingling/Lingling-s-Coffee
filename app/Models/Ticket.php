<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model {
    use HasFactory;

    protected $table = 'tickets';
    protected $fillable = ['id'];

    public function productos() {
        return $this->belongsToMany(Producto::class, 'ticket_producto')->withPivot('cantidad', 'subtotal');
    }
}
