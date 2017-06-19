<?php

namespace laboratorio;

use Illuminate\Database\Eloquent\Model;

class Tabla extends Model
{
    use Notifiable;

    protected $table = 'tabla';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'nombre', 'descripcion', 'idproblema',
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
