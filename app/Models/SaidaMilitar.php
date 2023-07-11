<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaidaMilitar extends Model
{
    use HasFactory;

    protected $fillable = [
        'data',
        'hora_saida',
        'hora_retorno',
        'destino',
        'militars_id'
    ];

}
