<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Puc extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'cuenta',
        'descripcion',
        'nivel',
        'naturaleza',
        'user_id'
    ];

    protected $table = "pucs";

    protected $dates = ['deleted_at'];

}
