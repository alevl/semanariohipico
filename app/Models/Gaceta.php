<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaceta extends Model
{
    /** @use HasFactory<\Database\Factories\GacetaFactory> */
    use HasFactory;

    protected $fillable = [
        'fecha',
        'hipodromo_id',
        'ruta',
        'fecha_invertida',
    ];

    public function gaceta_hipodromo()
    {
        return $this->belongsTo(Hipodromo::class, 'hipodromo_id');
    }
}
