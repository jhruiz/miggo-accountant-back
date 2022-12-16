<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoidentificacioneSeeder extends Seeder
{
    public function run()
    {
        $descripcion[1]= 'C.C';

        $descripcion[2]= 'C.E';
        
        $descripcion[3]= 'PASAPORTE';

        for ($i=1;$i<=3; $i++){
        
            DB::table('tipoidentificaciones')->insert([
            'id' => $i,
            'descripcion'=> $descripcion[$i],
          ]);
        }
    }
}
