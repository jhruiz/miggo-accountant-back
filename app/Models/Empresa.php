<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


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
         'moneda',
         'vercuentasdb',
         'ciudade_id',
         'empresa_id'
     ];
 
     protected $table = "empresas";
 
     protected $dates = ['deleted_at'];

     public function users(){
       return $this->hasMany(User::class);
     }

     public function proveedores(){
       return $this->hasMany(Proveedore::class);
     }

     public function clientes(){
        return $this->hasMany(Cliente::class);
    }

     public function perfiles(){
       return $this->hasMany(Perfile::class);
     }

     public function clasificacionclientes(){
       return $this->hasMany(ClasificacionCliente::class);
     }

     public function estados(){
       return $this->hasMany(Estado::class);
     }

     public function empresas_relacionadas(){
        return $this->hasMany(Empresa::class);
     }

     public function ciudad(){
        return $this->hasOne(Ciudad::class);
     }

     public function empleados(){
        return $this->hasMany(Empleado::class);
     }

     public function vehiculos(){
      return $this->hasMany(Vehiculo::class);
      }

      public function puc(){
        return $this->hasMany(Puc::class);
      }

      public function gruposactivosfijos(){
        return $this->hasMany(Gruposactivosfijo::class);
      }

      // public function activosfijos(){
      //   return $this->hasMany(Activosfijo::class);
      // }

}
