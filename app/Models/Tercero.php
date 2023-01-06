<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Tercero extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =[
            'nombres',
            'apellidos',
            'nit',
            'identificacion',
            'direccion',
            'direccion2',
            'celular',
            'telefono',
            'email',
            'cumpleanios',
            'idiomaComunicacion',
            'sector',
            'actividad',
            'siguienteactividad',
            'tarjetaprofesional',
            'pronombre',
            'msgemail',
            'ciudade_id',
            'tipodireccione_id',
            'tipodireccione2_id',
            'tipoidentificacione_id',
            'clasificacioncontacto_id',
            'terminospago_id'
    ];

    protected $table = "terceros";

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
