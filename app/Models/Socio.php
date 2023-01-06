<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Socio extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =[
        'sueldo',
        'observaciones',
        'estadisticas',
        'estatus',
        'inicio',
        'puestoTrabajo',
        'user_id',
        'empresa_id',
        'tercero_id',
        'tipodesocio_id'
    ];

    protected $table = "socios";

    protected $dates = ['deleted_at'];
}
