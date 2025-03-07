<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupon extends Model {
    use HasFactory;

    protected $table = 'cupones';

    protected $fillable = ['codigo', 'descuento', 'valido_desde', 'valido_hasta'];
}

