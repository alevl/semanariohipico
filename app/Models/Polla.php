<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polla extends Model
{
    /** @use HasFactory<\Database\Factories\PollaFactory> */
    use HasFactory;

    protected $fillable = [
        'propietario_id',
        'fecha',
        'hora_cierre',
        'hipodromo_id',
        'estatus_id',
        'monto_pagar',
        'inscripcion',
        'inscritos',
        'comision',
        'incentivo',
        'numero_carreras',
        'observacion',
        'carreras_programadas',
        'primera_uno',
        'primera_dos',
        'primera_tres',
        'segunda_uno',
        'segunda_dos',
        'segunda_tres',
        'tercera_uno',
        'tercera_dos',
        'tercera_tres',
        'cuarta_uno',
        'cuarta_dos',
        'cuarta_tres',
        'quinta_uno',
        'quinta_dos',
        'quinta_tres',
        'sexta_uno',
        'sexta_dos',
        'sexta_tres',
    ];

    public function polla_hipodromo()
    {
        return $this->belongsTo(Hipodromo::class, 'hipodromo_id');
    }

    public function polla_estatus()
    {
        return $this->belongsTo(EstatusPolla::class, 'estatus_id');
    }

}
