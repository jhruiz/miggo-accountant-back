<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gruposactivosfijo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [   
            'codigo',
            'descripcion',
            'empresa_id'
     ];

    protected $table = "grupoactivos";

    protected $dates = ['deleted_at'];

    public function empresa(){
      return $this->belongsTo(Empresa::class);
    }

    public function activosfijos(){
        return $this->hasMany(Activosfijo::class);
      }
}
