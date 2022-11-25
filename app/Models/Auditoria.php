<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Auditoria extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'accion',
        'descripcion',
        'user_id'
    ];

    protected $table = "auditorias";

    protected $dates = ['deleted_at'];
}
