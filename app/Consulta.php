<?php

namespace laboratorio;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Consulta extends Model
{
    use Notifiable;

    protected $table = 'consulta';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'idproblema', 'descripcion', 'explicacion', 'solucion', 'explicsolucion', 'solucionalternativa', 'numpracticas',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];
}
