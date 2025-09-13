<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Origene extends Model
{
    /** @use HasFactory<\Database\Factories\OrigeneFactory> */
    use HasFactory;

    protected $fillable = [
        'origen',
    ];
}
