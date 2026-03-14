<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remate extends Model
{
    /** @use HasFactory<\Database\Factories\RemateFactory> */
    use HasFactory;

    protected $fillable = [
        'propietario_id',
        'fecha',
        'hora_cierre',
        'hipodromo_id',
        'estatus_id',
        'monto_pagar',
        'comision',
        'incentivo',
        'carrera',
        'observacion',
        'cierre_carrera',
    ];

    public function remate_hipodromo()
    {
        return $this->belongsTo(Hipodromo::class, 'hipodromo_id');
    }

    public function remate_estatus()
    {
        return $this->belongsTo(EstatusRemate::class, 'estatus_id');
    }

    public function remate_user()
    {
        return $this->hasMany(User::class, 'id');
    }
    public function remate_banquero()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
    public function remate_administrador()
    {
        return $this->belongsTo(User::class, 'propietario_id');
    }

}
