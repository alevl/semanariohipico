<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RematesDetalle extends Model
{
    /** @use HasFactory<\Database\Factories\RematesDetalleFactory> */
    use HasFactory;

    protected $fillable = [
        'remate_id',
        'carrera',
        'numero_ejemplar',
        'caballo_id',
        'usuario_id',
        'monto',
        'puja_anterior',
        'ejemplar',
    ];

    public function tabla_usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

}
