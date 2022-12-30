<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciiuclase extends Model
{
        protected $fillable = [   
            'codigo',
            'descripcion',
    ];

    protected $table = "ciiclases";


    public function ciiugrupo()
    {
    return $this->belongsTo(Ciiugrupo::class);
    }

}
