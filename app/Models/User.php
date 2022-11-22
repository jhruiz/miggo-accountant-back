<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\SoftDeletes;
//use Caffeinated\Shinobi\Models\Role;
//use Caffeinated\Shinobi\Models\Permission;
//use Caffeinated\Shinobi\Concerns\HasRolesAndPermissions;
//use Carbon\Carbon;


class User extends Authenticatable
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
        'estado_id',
        'empresa_id',
        'estatus'
        
    ];

    protected $table = "users";

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',  'estatus' => 'boolean',
    ];

    protected $dates = ['deleted_at'];

    
}
