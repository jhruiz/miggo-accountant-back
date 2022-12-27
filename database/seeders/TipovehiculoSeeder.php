<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipovehiculoSeeder extends Seeder
{

    public function run()
    {
        $descripcion[1]= 'MOTO';

        $descripcion[2]= 'CUATRIMOTO';
        
        $descripcion[3]= 'JETSKY';

        $descripcion[4]= 'CARRO';     
 
        $descripcion[5]= 'CAMIONETA';

        $descripcion[6]= 'FURGON';

        $descripcion[7]= 'MOTOCARRO';

 
        for ($i=1;$i<=7; $i++){
        
            DB::table('tipovehiculos')->insert([

            'id' => $i,
            'descripcion'=> $descripcion[$i],

          ]);
        }
    }
}
