<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pais extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [   
            'descripcion',
     ];

    protected $table = "paises";

    protected $dates = ['deleted_at'];

    public function departamentos()
    {
      return $this->hasMany(Departamento::class);
    }
}
