<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarrerasJugada extends Model
{
    /** @use HasFactory<\Database\Factories\CarrerasJugadaFactory> */
    use HasFactory;

    protected $fillable = [
        'propietario_id',
        'banquero_id',
        'taquilla_id',
        'carrera_id',
        'carrera',
        'hipodromo_id',
        'origen_id',
        'apuesta',
        'numero_ejemplar',
        'numero_ejemplar_place',
        'numero_ejemplar_show',
        'numero_ejemplar_exacta1',
        'numero_ejemplar_exacta2',
        'numero_ejemplar_trifecta1',
        'numero_ejemplar_trifecta2',
        'numero_ejemplar_trifecta3',
        'numero_ejemplar_superfecta1',
        'numero_ejemplar_superfecta2',
        'numero_ejemplar_superfecta3',
        'numero_ejemplar_superfecta4',
        'monto_apuesta',
        'apuesta_ganador',
        'apuesta_place',
        'apuesta_show',
        'apuesta_exacta',
        'apuesta_trifecta',
        'apuesta_superfecta',
        'caballo_ganador',
        'caballo_segundo',
        'caballo_tercero',
        'caballo_cuarto',
        'dividendo_ganador',
        'dividendo_ganador_place',
        'dividendo_ganador_show',
        'dividendo_segundo_place',
        'dividendo_segundo_show',
        'dividendo_tercero_show',
        'dividendo_exacta',
        'dividendo_trifecta',
        'dividendo_superfecta',
        'perdio_ganador',
        'perdio_place',
        'perdio_show',
        'perdio_exacta',
        'perdio_trifecta',
        'perdio_superfecta',
        'total_ganado',
        'total_perdido',
        'ticket',
        'cod_seguridad',
        'moneda_id',
        'fecha_jugada',
        'hora_apuesta',
        'hora_anulado',
        'estatus_id',
        'online_pagado',
        'fecha_invertida',
    ];

    public function jugada_hipodromo()
    {
        return $this->belongsTo(Hipodromo::class, 'hipodromo_id');
    }

    public function jugada_estatus()
    {
        return $this->belongsTo(EstatusTicket::class, 'estatus_id');
    }

    public function jugada_banquero()
    {
        return $this->belongsTo(User::class, 'banquero_id');
    }

    public function jugada_taquilla()
    {
        return $this->belongsTo(User::class, 'taquilla_id');
    }

    public function jugada_origen()
    {
        return $this->belongsTo(Origene::class, 'origen_id');
    }

    public function jugada_moneda()
    {
        return $this->belongsTo(Moneda::class, 'moneda_id');
    }
    public function jugada_propietario()
    {
        return $this->belongsTo(User::class, 'propietario_id');
    }
    public function jugada_usuario()
    {
        return $this->belongsTo(User::class, 'taquilla_id');
    }
}
