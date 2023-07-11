<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntradaVisitante extends Model
{
    use HasFactory;

    protected $table = 'entrada_visitante';

    protected $fillable = [
        'data',
        'hora_entrada',
        'hora_saida',
        'destino',
        'falar',
        'visitante_id',
    ];

}
