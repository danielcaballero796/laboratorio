<?php

namespace laboratorio;

use Illuminate\Database\Eloquent\Model;

class Finals extends Model
{
    use Notifiable;

    protected $table = 'final';

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
