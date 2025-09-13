<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecargasRetiro extends Model
{
    /** @use HasFactory<\Database\Factories\RecargasRetiroFactory> */
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'fecha',
        'fecha_invertida',
        'operacion_id',
        'monto',
        'descripcion',
        'referencia',
        'estatus_id',
    ];

}
