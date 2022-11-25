<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unidadesmedida extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'description',
        'empresa_id'
    ];

    protected $table = "unidadesmedidas";

    protected $dates = ['deleted_at'];
}
