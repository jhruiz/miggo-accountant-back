<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipovehiculoSeeder extends Seeder
{

    public function run()
    {
        $descripcion[5]= 'MOTO';

        $descripcion[6]= 'CUATRIMOTO';
        
        $descripcion[7]= 'JETSKY';

        $descripcion[8]= 'CARRO';     
 
        $descripcion[9]= 'CAMIONETA';

        $descripcion[10]= 'FURGON';

        $descripcion[11]= 'MOTOCARRO';

 
        for ($i=5;$i<=11; $i++){
        
            DB::table('tipovehiculos')->insert([

            'id' => $i,
            'descripcion'=> $descripcion[$i],

          ]);
        }
    }
}
