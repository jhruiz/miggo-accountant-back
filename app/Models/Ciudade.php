<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ciudade extends Model
{
    use HasFactory;

    protected $fillable = [   
            'descripcion',
            'departamento_id'
     ];

    protected $table = "ciudades";

    public function departamento()
    {
      return $this->belongsTo(Departamento::class);
    }

    public function empresa()
    {
      return $this->belongsTo(Empresa::class);
    }

    public function persona()
    {
      return $this->belongsTo(Persona::class);
    }

}
