<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use League\CommonMark\Reference\Reference;

class Vehiculo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'placa',
        'cilindraje',
        'modelo',
        'color',
        'num_motor',
        'num_chasis',
        'linea',
        'soat',
        'tecno',
        'tipovehiculo_id',
        'marcavehiculo_id',
        'empresa_id'
    ];

    protected $table = "vehiculos";
 
    protected $dates = ['deleted_at'];

    public function marcavehiculo(){
        return $this->belongsTo(Marcavehiculo::class);
    }

    public function tipovehiculo(){
        return $this->belongsTo(Tipovehiculo::class);
    }

    public function referencia(){
        return $this->belongsTo(Referencia::class);
    }

    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }
}
