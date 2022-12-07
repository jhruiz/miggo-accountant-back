<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departamento extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [   
            'descripcion',
     ];

    protected $table = "departamentos";

    protected $dates = ['deleted_at'];

    public function pais()
    {
      return $this->belongsTo(Pais::class);
    }

    public function ciudades()
    {
      return $this->hasMany(Ciudad::class);
    }
}
