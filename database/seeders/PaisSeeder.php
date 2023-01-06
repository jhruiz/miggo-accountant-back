<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  Illuminate\Support\Facades\DB;


class PaisSeeder extends Seeder
{

    public function run()
    {
     
        $sql = database_path($path= 'precarga_estatica/paises.sql');
        DB::unprepared(file_get_contents($sql));

            $id[1]=5;
            $departamentos[1]= 'ANTIOQUIA';
            $codigo_dian[1] = '05';

            $id[2]=8;
            $departamentos[2]= 'ATLÁNTICO';
            $codigo_dian[2] = '08';

            $id[3]=11;
            $departamentos[3]= 'BOGOTÁ, D.C.';
            $codigo_dian[3] = '11';

            $id[4]=13;
            $departamentos[4]= 'BOLÍVAR';
            $codigo_dian[4] = '13';

            $id[5]=15;
            $departamentos[5]= 'BOYACÁ';
            $codigo_dian[5] = '15';

            $id[6]=17;
            $departamentos[6]= 'CALDAS';
            $codigo_dian[6] = '17';

            $id[7]=18;
            $departamentos[7]= 'CAQUETÁ';
            $codigo_dian[7] = '18';

            $id[8]=19;
            $departamentos[8]= 'CAUCA';
            $codigo_dian[8] = '19';

            $id[9]=20;
            $departamentos[9]= 'CESAR';
            $codigo_dian[9] = '20';

            $id[10]=23;
            $departamentos[10]= 'CÓRDOBA';
            $codigo_dian[10] = '23';

            $id[11]=25;
            $departamentos[11]= 'CUNDINAMARCA';
            $codigo_dian[11] = '25';

            $id[12]=27;
            $departamentos[12]= 'CHOCÓ';
            $codigo_dian[12] = '27';

            $id[13]=41;
            $departamentos[13]= 'HUILA';
            $codigo_dian[13] = '41';

            $id[14]=44;
            $departamentos[14]= 'LA GUAJIRA';
            $codigo_dian[14] = '44';

            $id[15]=47;
            $departamentos[15]= 'MAGDALENA';
            $codigo_dian[15] = '47';

            $id[16]=50;
            $departamentos[16]= 'META';
            $codigo_dian[16] = '50';

            $id[17]=52;
            $departamentos[17]= 'NARIÑO';
            $codigo_dian[17] = '52';

            $id[18]=54;
            $departamentos[18]= 'NORTE DE SANTANDER';
            $codigo_dian[18] = '54';

            $id[19]=63;
            $departamentos[19]= 'QUINDIO';
            $codigo_dian[19] = '63';

            $id[20]=66;
            $departamentos[20]= 'RISARALDA';
            $codigo_dian[20] = '66';

            $id[21]=68;
            $departamentos[21]= 'SANTANDER';
            $codigo_dian[21] = '68';

            $id[22]=70;
            $departamentos[22]= 'SUCRE';
            $codigo_dian[22] = '70';

            $id[23]=73;
            $departamentos[23]= 'TOLIMA';
            $codigo_dian[23] = '73';

            $id[24]=76;
            $departamentos[24]= 'VALLE DEL CAUCA';
            $codigo_dian[24] = '76';

            $id[25]=81;
            $departamentos[25]= 'ARAUCA';
            $codigo_dian[25] = '81';

            $id[26]=85;
            $departamentos[26]= 'CASANARE';
            $codigo_dian[26] = '85';

            $id[27]=86;
            $departamentos[27]= 'PUTUMAYO';
            $codigo_dian[27] = '86';

            $id[28]=88;
            $departamentos[28]= 'ARCHIPIÉLAGO DE SAN ANDRÉS, PROVIDENCIA Y SANTA CATALINA';
            $codigo_dian[28] = '88';
            
            $id[29]=91;
            $departamentos[29]= 'AMAZONAS';
            $codigo_dian[29] = '91';

            $id[30]=94;
            $departamentos[30]= 'GUAINÍA';
            $codigo_dian[30] = '94';

            $id[31]=95;
            $departamentos[31]= 'GUAVIARE';
            $codigo_dian[31] = '95';

            $id[32]=97;
            $departamentos[32]= 'VAUPÉS';
            $codigo_dian[32] = '97';

            $id[33]=99;
            $departamentos[33]= 'VICHADA';
            $codigo_dian[33] = '99';



        for ($i=1;$i<=33; $i++){
        
            DB::table('departamentos')->insert([

            'id' => $id[$i],
            'descripcion'=> $departamentos[$i],
            'codigo_dian'=> $codigo_dian[$i],
            'paise_id'=> 170,

          ]);
        }

        $sql = database_path($path= 'precarga_estatica/miggo_ciudades_dian.sql');
        DB::unprepared(file_get_contents($sql));


    }
}



