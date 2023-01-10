<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activosfijo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [   
        'nombre',
        'codigo',
        'direccion',
        'alquilable',
        'imagen',
        'nivelcentrocosto',
        'adquisicionfecha',
        'depreciaraniocompra',
        'depreciarmesescompra',
        'salvamento',
        'depreciaranio',
        'depreciarmeses',
        'residuo',
        'observaciones',
        'costohora',
        'creador_id',
        'ciudade_id',
        'tipoactivo_id',
        'puc_id',
        'estadoactivo_id',
        'responsable_id',
        'centrocosto_id',
        'grupoactivo_id'
     ];

    protected $table = "activosfijos";

    protected $dates = ['deleted_at'];

    public function ciudad(){
        return $this->belongsTo(Ciudad::class);
     }

    //  public function creador(){
    //     return $this->hasOne(User::class);
    //  }

     public function tiposactivosfijo(){
        return $this->belongsTo(Tiposactivosfijo::class);
     }

     public function puc(){
        return $this->belongsTo(Puc::class);
     }

     public function estadoactivo(){
        return $this->belongsTo(Estadoactivo::class);
     }

     public function responsable(){
        return $this->belongsTo(Tercero::class);
     }

     public function centrocosto(){//1 .. n
        return $this->belongsTo(Centrocosto::class);
     }

     public function grupoactivo(){//1 .. n
        return $this->belongsTo(Gruposactivosfijo::class);
     }
}
