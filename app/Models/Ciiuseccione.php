<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciiuseccione extends Model
{
    use HasFactory;

    protected $fillable = [   
            'nombre',
            'descripcion',
     ];

    protected $table = "ciiusecciones";

    public function ciiudiviciones()
    {
      return $this->hasMany(Ciiudivicione::class);
    }
}
