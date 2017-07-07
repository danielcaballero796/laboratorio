<?php

namespace laboratorio;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Problema extends Model
{
    use Notifiable;

    protected $table = 'problema';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
            'id', 'nombre', 'descripcion', 'docente', 'estado', 'nombrebase',
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
