<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tipoevento extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [   
        'descripcion',
        'preselect',
        'empresa_id'
    ];

    protected $table = "eventos";

    protected $dates = ['deleted_at'];
}
