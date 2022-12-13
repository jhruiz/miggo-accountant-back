<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departamento extends Model
{
    use HasFactory;

    protected $fillable = [   
            'descripcion',
            'paise_id'
     ];

    protected $table = "departamentos";

    public function paise()
    {
      return $this->belongsTo(Paise::class);
    }

    public function ciudades()
    {
      return $this->hasMany(Ciudade::class);
    }
}
