<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;


    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    protected $table = "users";

    protected $dates = ['deleted_at'];

    /*****************  Accesores  *****************/
    
    public function getNameAttribute($valor)//vista
    {
        //return ucfirst($valor);
        return ucwords($valor);

    }

/*****************  Mutadores  *****************/

    public function setNameAttribute($valor)//DB
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
        'email_verified_at' => 'datetime',
    ];



    
}
