<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarrerasDetalle extends Model
{
    /** @use HasFactory<\Database\Factories\CarrerasDetalleFactory> */
    use HasFactory;

    protected $fillable = [
        'carrera_id',
        'carrera',
        'numero_ejemplar',
        'fecha_carrera',
    ];
}
