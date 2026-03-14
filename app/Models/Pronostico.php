<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pronostico extends Model
{
    /** @use HasFactory<\Database\Factories\PronosticoFactory> */
    use HasFactory;

    protected $fillable = [
        'fecha_carrera',
        'fecha_invertida',
        'hipodromo_id',
        'carrera',
        'primera_marca',
        'segunda_marca',
        'tercera_marca',
        'cuarta_marca',
    ];

}
