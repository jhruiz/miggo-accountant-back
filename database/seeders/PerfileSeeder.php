<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerfileSeeder extends Seeder
{

    public function run()
    {
        $description[1]= 'ADMINISTRADOR';

        $description[2]= 'ADMINISTRADOR EMPRESA';
        
        $description[3]= 'VENDEDOR';

        $description[4]= 'BODEGA';     
 
        $description[5]= 'MECANICO';

 
        for ($i=1;$i<=5; $i++){
        
            DB::table('perfiles')->insert([

            'id' => $i,
            'description'=> $description[$i],

          ]);
        }
    }
}
