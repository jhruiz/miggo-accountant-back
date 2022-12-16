<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Persona extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =[
        'nombres',
        'apellidos',
        'rut',
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


    public function users()
    {
      return $this->hasMany(User::class);
    }

    public function clientes()
    {
      return $this->hasMany(Cliente::class);
    }

    public function empleados()
    {
      return $this->hasMany(Empleado::class);
    }

    public function proveedores()
    {
      return $this->hasMany(Proveedore::class);
    }

    public function ciudade()
    {
       return $this->belongsTo(Ciudade::class);
    }
}
