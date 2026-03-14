<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegaliasInternacionale extends Model
{
    /** @use HasFactory<\Database\Factories\RegaliasInternacionaleFactory> */
    use HasFactory;

    protected $fillable = [
        'banquero_id',
        'taquilla_id',
        'i_caso1',
        'f_caso1',
        'regalia1',
        'i_caso2',
        'f_caso2',
        'regalia2',
        'i_caso3',
        'f_caso3',
        'regalia3',
        'i_caso4',
        'f_caso4',
        'regalia4',
        'i_caso5',
        'f_caso5',
        'regalia5',
        'modo1',
        'modo2',
        'modo3',
        'modo4',
        'modo5',
    ];

}
