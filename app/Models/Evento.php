<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evento extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [  
        'fecha',
        'descripcion',
        'cliente',
        'telefono',
        'placa',
        'user_id',
        'empresa_id',
        'estadoalerta_id',
        'tipoevento_id'
      ];

    protected $table = "eventos";

    protected $dates = ['deleted_at'];

}
