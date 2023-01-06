<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Proveedore extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =[
        'nombre',
        'telefono',
        'paginaweb',
        'email',
        'diascredito',
        'limitecredito',
        'observaciones',
        'estatus',
        'user_id',
        'empresa_id',
        'tercero_id'
    ];

    protected $table = "proveedores";

    protected $dates = ['deleted_at'];

    public function tercero(){
        return $this->belongsTo(Tercero::class);
    }

    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }

    public function regimenes(){
        return $this->belongstoMany(Regimene::class)->withTimestamps();
    }
}
