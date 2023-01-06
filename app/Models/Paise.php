<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paise extends Model
{
    use HasFactory;

    protected $fillable = [   
            'descripcion',
            'codigo_dian'
     ];

    protected $table = "paises";

    public function departamentos()
    {
      return $this->hasMany(Departamento::class);
    }
}
