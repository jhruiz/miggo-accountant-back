<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PucSeeder extends Seeder
{

    public function run()
    {

        $descripcion[1] = 'ACTIVO';
        $descripcion[2] = 'PASIVO';
        $descripcion[3] = 'PATRIMONIO';
        $descripcion[4] = 'INGRESOS';
        $descripcion[5] = 'GASTOS';
        $descripcion[6] = 'COSTO DE VENTAS';
        $descripcion[7] = 'COSTOS DE PRODUCCIÓN O DE OPERACIÓN';
        $descripcion[8] = 'CUENTAS DE ORDEN DEUDORAS';
        $descripcion[9] = 'CUENTAS DE ORDEN ACREEDORAS';
        
 
        for ($i=1;$i<=9; $i++){
        
            DB::table('pucs')->insert([

            'id' => $i,
            'descripcion'=> $descripcion[$i],

          ]);
        }
    }
}
