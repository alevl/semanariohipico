<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
    /** @use HasFactory<\Database\Factories\PrecioFactory> */
    use HasFactory;

    protected $fillable = [
        'moneda_id',
        'ganador',
        'place',
        'show',
        'exacta',
    ];

    public function precio_moneda()
    {
        return $this->belongsTo(Moneda::class, 'moneda_id');
    }
}
