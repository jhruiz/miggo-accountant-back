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
            'codigo_dian',
            'departamento_id',
            'creador_id'
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

    public function terceros()
    {
      return $this->hasMany(Tercero::class);
    }

    public function activosfijos(){
      return $this->hasMany(Activosfijo::class);
    }

}
