<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tiposactivosfijo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [   
            'descripcion'
     ];

    protected $table = "tipoactivosfijos";

    protected $dates = ['deleted_at'];

    public function activosfijos(){
        return $this->hasMany(Activosfijo::class);
     }
}
