<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerfileSeeder extends Seeder
{

    public function run()
    {
        $descripcion[1]= 'ADMINISTRADOR';

        $descripcion[2]= 'ADMINISTRADOR EMPRESA';
        
        $descripcion[3]= 'VENDEDOR';

        $descripcion[4]= 'BODEGA';     
 
        $descripcion[5]= 'MECANICO';

 
        for ($i=1;$i<=5; $i++){
        
            DB::table('perfiles')->insert([

            'id' => $i,
            'descripcion'=> $descripcion[$i],

          ]);
        }
    }
}
