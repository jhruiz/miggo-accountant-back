<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estado extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [   
            'descripcion',
            'modulo',
            'empresa_id'
     ];

    protected $table = "estados";

    protected $dates = ['deleted_at'];

    public function empresa()
    {
      return $this->belongsTo(Empresa::class);
    }
}
