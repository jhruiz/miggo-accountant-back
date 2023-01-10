<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CentroCosto extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [   
        'nombre',
        'descripcion',
        'empresa_id'
     ];

    protected $table = "centrocostos";

    protected $dates = ['deleted_at'];


    public function activosfijos(){
        return $this->hasMany(Activosfijo::class);
      }
}
