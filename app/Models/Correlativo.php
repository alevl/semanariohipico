<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Correlativo extends Model
{
    /** @use HasFactory<\Database\Factories\CorrelativoFactory> */
    use HasFactory;

    protected $fillable = [
        'numero',
    ];

}
