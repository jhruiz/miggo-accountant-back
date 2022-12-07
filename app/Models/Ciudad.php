<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ciudad extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [   
            'descripcion',
            'empresa_id'
     ];

    protected $table = "ciudades";

    protected $dates = ['deleted_at'];

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
