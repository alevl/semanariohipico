<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tope extends Model
{
    /** @use HasFactory<\Database\Factories\TopeFactory> */
    use HasFactory;

    protected $fillable = [
    'banquero_id',
    'taquilla_id',
    'moneda_id',
    'cupo_caballo',
    'apuesta_minima',
    'apuesta_maxima',
    'maximo_dividendo',
    ];

    public function tope_moneda()
    {
        return $this->belongsTo(Moneda::class, 'moneda_id');
    }
}
