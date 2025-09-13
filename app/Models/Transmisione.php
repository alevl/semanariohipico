<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transmisione extends Model
{
    /** @use HasFactory<\Database\Factories\TransmisioneFactory> */
    use HasFactory;

    protected $fillable = [
        'fecha',
        'ruta',
        'fecha_invertida',
        'canal',
    ];

}
