<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hipodromo extends Model
{
    /** @use HasFactory<\Database\Factories\HipodromoFactory> */
    use HasFactory;

    protected $fillable = [
        'hipodromo',
    ];

}
