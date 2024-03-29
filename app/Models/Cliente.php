<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Cliente extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =[

        'nit',
        'paginaweb',
        'diascredito',
        'limitecredito',
        'observaciones',
        'estadisticas',
        'estatus',
        'user_id',
        'empresa_id',
        'clasificacioncliente_id',
        'persona_id'
    ];

    protected $table = "clientes";

    protected $dates = ['deleted_at'];

    public function persona(){
        return $this->belongsTo(Persona::class);
    }

    public function clasificacioncliente(){
        return $this->hasOne(ClasificacionCliente::class);
    }

    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }

}
