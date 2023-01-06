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
        
        // A su vez, las tres primeras clases conforman las cuentas de balance, las clases 4,5,6 y 7 conforman las cuentas de resultado 
        // y finalmente las clases 8 y 9 se denominan las cuentas de orden. Las cuentas de balance, reciben esta denominación debido a 
        // que son las usadas para realizar el balance general, y las cuentas de resultado, el estado de resultado o de pérdida y ganancia
 
        // Activo: Débito.
        // Pasivo: Crédito.
        // Patrimonio: Crédito.
        // Ingresos: Crédito.
        // Gastos: Débito.
        // Costo de ventas: Débito.
        // Costo de fabricación: Débito.
        // Cuentas de orden deudoras: Crédito.
        // Cuentas de orden acreedoras: Débito.


        for ($i=1;$i<=9; $i++){
        
            DB::table('pucs')->insert([

            'id' => $i,
            'descripcion'=> $descripcion[$i],

          ]);
        }

        $sql = database_path($path= 'precarga_estatica/pucs.sql');
        DB::unprepared(file_get_contents($sql));
    }
}
