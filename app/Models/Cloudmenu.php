<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cloudmenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',
        'url',
        'imagen',
        'orden',
        'administrador',
        'cloudmenu_id',
        'ayuda'
     ];

    protected $table = "cloudmenus";

}


   


