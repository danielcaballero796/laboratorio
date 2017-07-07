<?php

namespace laboratorio;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Finals extends Model
{
    use Notifiable;

    protected $table = 'final';

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'usuario', 'idconsulta', 'sql', 'resultado'
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
