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
        'naturaleza',
        'user_id',
        'empresa_id',
        'puc_id'
    ];

    protected $table = "pucs";

    protected $dates = ['deleted_at'];

    public function pucs(){
        return $this->hasMany(Puc::class);
     }

     public function empresa(){
        return $this->belongsTo(Empresa::class);
     }

}
