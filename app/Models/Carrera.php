<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    /** @use HasFactory<\Database\Factories\CarreraFactory> */
    use HasFactory;

    protected $fillable = [
        'numero_carrera',
        'hipodromo_id',
        'fecha_carrera',
        'hora_cierre',
        'apuesta_id',
        'caballo_ganador',
        'caballo_segundo',
        'caballo_tercero',
        'caballo_cuarto',
        'dividendo_ganador',
        'dividendo_ganador_place',
        'dividendo_ganador_show',
        'dividendo_segundo_show',
        'dividendo_segundo_place',
        'dividendo_tercero_show',
        'total_jugado',
        'total_pagado',
        'estatus_id',
        'dividendo_exacta',
        'dividendo_trifecta',
        'dividendo_superfecta',
    ];

    public function carrera_hipodromo()
    {
        return $this->belongsTo(Hipodromo::class, 'hipodromo_id');
    }

    public function carrera_estatus()
    {
        return $this->belongsTo(EstatusCarrera::class, 'estatus_id');
    }

    public function carrera_apuesta()
    {
        return $this->belongsTo(TipoApuesta::class, 'apuesta_id');
    }
}
