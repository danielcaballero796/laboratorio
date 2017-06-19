<?php

namespace laboratorio;

use Illuminate\Database\Eloquent\Model;

class Practica extends Model
{
    use Notifiable;

    protected $table = 'practica';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'usuario', 'idconsulta', 'id', 'sql', 'fecha', 'resultado',
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
