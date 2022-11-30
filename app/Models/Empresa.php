<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nombre',
        'razonsocial',
         'nit',
         'direccion',
         'telefono1',
         'telefono2',
         'email',
         'representantelegal',
         'imagen',
         'logo',
         'texto1',
         'texto2',
         'texto3',
         'texto4',
         'vercuentasdb',
         'ciudade_id',
         'empresa_id'
     ];
 
     protected $table = "empresas";
 
     protected $dates = ['deleted_at'];

}
