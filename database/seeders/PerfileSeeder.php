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

        $descripcion[1]= 'DE CONTACTO';

        $descripcion[2]= 'DE VENTA';
        
        $descripcion[3]= 'DE DESPACHO';

        $descripcion[4]= 'OTRA';     
 
        $descripcion[5]= 'PRIVADA';

 
        for ($i=1;$i<=5; $i++){
        
            DB::table('tipodirecciones')->insert([

            'id' => $i,
            'descripcion'=> $descripcion[$i],

          ]);
        }

        $descripcion[1]= 'BUEN DEUDOR';

        $descripcion[2]= 'DEUDOR NORMAL';
        
        $descripcion[3]= 'DEUDOR INCOBRABLE';

 
        for ($i=1;$i<=3; $i++){
        
            DB::table('gradodeudores')->insert([

            'id' => $i,
            'descripcion'=> $descripcion[$i],

          ]);
        }

        $descripcion[1]= 'CONTADOR';

        $descripcion[2]= 'GERENTE';
        
        $descripcion[3]= 'REVISOR FISCAL';

        $descripcion[4]= 'REPRESENTANTE LEGAL';


 
        for ($i=1;$i<=4; $i++){
        
            DB::table('clasificacioncontactos')->insert([

            'id' => $i,
            'descripcion'=> $descripcion[$i],

          ]);
        }


        $descripcion[1]= 'CONTADO';

        $descripcion[2]= '30 días';
        
        $descripcion[3]= '60 días';

        $descripcion[4]= '90 días';


 
        for ($i=1;$i<=4; $i++){
        
            DB::table('terminospagos')->insert([

            'id' => $i,
            'descripcion'=> $descripcion[$i],

          ]);
        }

        $descripcion[1]= 'GESTOR';

        $descripcion[2]= 'CAPITALISTA';
        
        $descripcion[3]= 'COMANDATARIO';

        $descripcion[4]= 'INDUSTRIAL';


 
        for ($i=1;$i<=4; $i++){
        
            DB::table('tiposocios')->insert([

            'id' => $i,
            'descripcion'=> $descripcion[$i],

          ]);
        }

        $descripcion[1]= 'Impuesto sobre las ventas (IVA)';

        $descripcion[2]= 'No responsable de IVA';
        
        $descripcion[3]= 'Especial';

        $descripcion[4]= 'Simplificado';

        $descripcion[5]= 'Simple Tributación';

 
        for ($i=1;$i<=5; $i++){
        
            DB::table('regimenes')->insert([

            'id' => $i,
            'descripcion'=> $descripcion[$i],

          ]);
        }

        $descripcion[1]= 0.0;

        $descripcion[2]= 0.05;

        $descripcion[3]= 0.1;
        
        $descripcion[4]= 0.2;

 
        for ($i=1;$i<=4; $i++){
        
            DB::table('clientedescuentos')->insert([

            'id' => $i,
            'descripcion'=> $descripcion[$i],

          ]);
        }


        $descripcion[1]= 'pequeño';

        $descripcion[2]= 'grande';


 
        for ($i=1;$i<=2; $i++){
        
            DB::table('tipocontribuyentes')->insert([

            'id' => $i,
            'descripcion'=> $descripcion[$i],

          ]);
        }


        $codigo[1]= 'A';
        $descripcion[1]= 'Anonima';

        $codigo[2]= 'B';
        $descripcion[2]= 'Anonima Simplificada';

        $codigo[3]= 'C';
        $descripcion[3]= 'Limitada';

        $codigo[4]= 'D';
        $descripcion[4]= 'Persona Natural';

        $codigo[5]= 'E';
        $descripcion[5]= 'Capital Social';

        $codigo[6]= 'F';
        $descripcion[6]= 'Unión Temporal';

        $codigo[7]= 'G';
        $descripcion[7]= 'Unipersonal';

        $codigo[8]= 'H';
        $descripcion[8]= 'Entidad Sin Ánimo De Lucro';

        $codigo[9]= 'I';
        $descripcion[9]= 'Comandita';


        for ($i=1;$i<=9; $i++){
        
            DB::table('tiposociedades')->insert([

            'id' => $i,
            'codigo'=> $codigo[$i],
            'descripcion'=> $descripcion[$i],

          ]);
        }
    }
}
