<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Ciiuclase extends Model
{
    use HasFactory;

        protected $fillable = [   
            'codigo',
            'descripcion',
            'ciiugrupo_id',
    ];

    protected $table = "ciiuclases";


    public function ciiugrupo()
    {
    return $this->belongsTo(Ciiugrupo::class);
    }

}
