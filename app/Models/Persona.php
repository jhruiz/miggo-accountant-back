<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Persona extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =[
        'nombre',
        'identificacion',
        'direccion',
        'celular',
        'telefono',
        'email',
        'cumpleanios',
        'ciudade_id'
    ];

    protected $table = "personas";

    protected $dates = ['deleted_at'];


}
