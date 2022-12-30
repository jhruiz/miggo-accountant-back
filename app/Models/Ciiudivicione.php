<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciiudivicione extends Model
{
    use HasFactory;

    protected $fillable = [   
            'codigo',
            'descripcion',
     ];

    protected $table = "ciiudivisiones";


    public function ciiugrupos()
    {
      return $this->hasMany(Ciiugrupo::class);
    }

    public function ciiusecciones()
    {
    return $this->belongsTo(Ciiuseccione::class);
    }

}
