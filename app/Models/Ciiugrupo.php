<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciiugrupo extends Model
{
    use HasFactory;

    protected $fillable = [   
            'codigo',
            'descripcion',
     ];

    protected $table = "ciiugrupos";

    public function ciiuclases()
    {
      return $this->hasMany(Ciiuclase::class);
    }

    public function ciiudivisiones()
    {
    return $this->belongsTo(Ciiudivisione::class);
    }
}
