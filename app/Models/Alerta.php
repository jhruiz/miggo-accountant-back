<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alerta extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'description',
        'enlista',
        'empresa_id'
    ];

    protected $table = "alertas";

    protected $dates = ['deleted_at'];
}
