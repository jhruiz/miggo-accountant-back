<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Marcavehiculo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'descripcion'
    ];

    protected $table = "marcavehiculos";
 
    protected $dates = ['deleted_at'];


    public function vehiculo()
    {
        return $this->hasOne(Vehiculo::class);
    }

}
