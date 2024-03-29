<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Perfile extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'descripcion',
        'empresa_id'
    ];


    protected $table = "perfiles";
 
    protected $dates = ['deleted_at'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }

}
