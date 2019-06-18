<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cpfPassageiro','destino','horario',
    ];

}
