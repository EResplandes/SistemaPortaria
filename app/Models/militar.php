<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class militar extends Model
{
    use HasFactory;

    protected $fillable = [
        'posto',
        'nome_guerra',
    ];

}
