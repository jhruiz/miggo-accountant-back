<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tipoidentificacione extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [   
        'descripcion'
    ];

    protected $table = "tipoidentificaciones";

    protected $dates = ['deleted_at'];
}
