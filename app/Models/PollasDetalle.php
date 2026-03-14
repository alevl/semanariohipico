<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollasDetalle extends Model
{
    /** @use HasFactory<\Database\Factories\PollasDetalleFactory> */
    use HasFactory;

    protected $fillable = [
        'polla_id',
        'carrera',
        'carrera_orden',
        'numero_ejemplar',
    ];

}
