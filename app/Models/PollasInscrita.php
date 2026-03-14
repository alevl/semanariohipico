<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollasInscrita extends Model
{
    /** @use HasFactory<\Database\Factories\PollasInscritaFactory> */
    use HasFactory;

    protected $fillable = [
        'polla_id',
        'usuario_id',
        'carrera1',
        'carrera2',
        'carrera3',
        'carrera4',
        'carrera5',
        'carrera6',
        'carrera7',
        'fecha_inscrita',
        'puntos_carrera1',
        'puntos_carrera2',
        'puntos_carrera3',
        'puntos_carrera4',
        'puntos_carrera5',
        'puntos_carrera6',
        'puntos_carrera7',
        'puntos_total',
        'estatus_id',
    ];

    public function inscrita_polla()
    {
        return $this->belongsTo(Polla::class, 'polla_id');
    }
    public function inscrita_usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
    public function inscrita_estatus()
    {
        return $this->belongsTo(EstatusPolla::class, 'estatus_id');
    }
    public function posicion_usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

}
