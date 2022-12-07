<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClasificacionCliente extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =[
        'descripcion',
        'empresa_id'
    ];

    protected $table = "clasificacionclientes";

    protected $dates = ['deleted_at'];

    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }


}
