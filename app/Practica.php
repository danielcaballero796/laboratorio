<?php

namespace laboratorio;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Practica extends Model
{
    use Notifiable;

    protected $table = 'practica';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'usuario', 'idconsulta', 'sql','resultado'
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
