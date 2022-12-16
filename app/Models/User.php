<?php

namespace App\Models;

use Carbon\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;//HasRolesAndPermissions

    protected $fillable = [
       'email',
        'password',
        'username',
        'imagen',
        'estadologin',
        'intentos',
        'preselect',
        'validaciongestion',
        'persona_id',
        'perfile_id',
        'empresa_id',
        'estatus'
    ];

    protected $table = "users";

    protected $dates = ['deleted_at'];

    /*****************  Accesores  *****************/
    
    public function getUsernameAttribute($valor)//vista
    {
        //return ucfirst($valor);
        // return strtoupper($value);
        return ucwords($valor);
    }

/*****************  Mutadores  *****************/

    public function setUsernameAttribute($valor)//DB
    {
        $this->attributes['username'] = strtolower($valor);
    }


    public function setEmailAttribute($valor)//DB
    {
        $this->attributes['email'] = strtolower($valor);
    }
    //************************************************* */

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',  'estatus' => 'boolean',
    ];


    public function persona(){
        return $this->belongsTo(Persona::class);
    }

    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }

    public function perfil()
    {
        return $this->hasOne(Perfile::class);
    }
    
    public function empleado()
    {
        return $this->hasOne(Empleado::class);
    }

}
