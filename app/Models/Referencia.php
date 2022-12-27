<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Referencia extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'descripcion'
    ];


    protected $table = "referencias";
 
    protected $dates = ['deleted_at'];

 
    public function vehiculo()
    {
        return $this->hasOne(Vehiculo::class);
    }
}
