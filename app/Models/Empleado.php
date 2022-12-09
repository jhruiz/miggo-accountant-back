<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Empleado extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =[
        'sueldo',
        'observaciones',
        'estadisticas',
        'estatus',
        'creador_id',
        'inicio',
        'inicio',
        'inicio',
        'user_id',
        'numero_cuenta',
        'tipo_cuenta',
        'empresa_id',
        'persona_id',
        'banco_id'

    ];

    protected $table = "empleados";

    protected $dates = ['deleted_at'];

    public function persona(){
        return $this->belongsTo(Persona::class);
    }

    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
