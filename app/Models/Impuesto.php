<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Impuesto extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'description',
        'empresa_id',
        'valor'
    ];

    protected $table = "impuestos";
 
    protected $dates = ['deleted_at'];

}
