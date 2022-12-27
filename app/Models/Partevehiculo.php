<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Partevehiculo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'descripcion',
        'extra'
    ];

    protected $table = "partevehiculos";
 
    protected $dates = ['deleted_at'];


    // public function vehiculo()
    // {
    //     return $this->hasOne(Vehiculo::class);
    // }
}