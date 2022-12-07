<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Regimene extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'description',
    ];


    protected $table = "regimenes";
 
    protected $dates = ['deleted_at'];


    public function proveedores(){
        return $this->belongsToMany(Proveedore::class);
    }
}
