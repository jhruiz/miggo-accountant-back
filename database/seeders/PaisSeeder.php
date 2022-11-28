<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  Illuminate\Support\Facades\DB;


class PaisSeeder extends Seeder
{

    public function run()
    {
     
        DB::table('paises')->insert([ 
            'id' => 1,
            'descripcion'=> 'Colombia',
        ]);

            $id[1]=5;
            $departamentos[1]= 'ANTIOQUIA';
            $id[2]=8;
            $departamentos[2]= 'ATLÁNTICO';
            $id[3]=11;
            $departamentos[3]= 'BOGOTÁ, D.C.';
            $id[4]=13;
            $departamentos[4]= 'BOLÍVAR';
            $id[5]=15;
            $departamentos[5]= 'BOYACÁ';
            $id[6]=17;
            $departamentos[6]= 'CALDAS';
            $id[7]=18;
            $departamentos[7]= 'CAQUETÁ';
            $id[8]=19;
            $departamentos[8]= 'CAUCA';
            $id[9]=20;
            $departamentos[9]= 'CESAR';
            $id[10]=23;
            $departamentos[10]= 'CÓRDOBA';
            $id[11]=25;
            $departamentos[11]= 'CUNDINAMARCA';
            $id[12]=27;
            $departamentos[12]= 'CHOCÓ';
            $id[13]=41;
            $departamentos[13]= 'HUILA';
            $id[14]=44;
            $departamentos[14]= 'LA GUAJIRA';
            $id[15]=47;
            $departamentos[15]= 'MAGDALENA';
            $id[16]=50;
            $departamentos[16]= 'META';
            $id[17]=52;
            $departamentos[17]= 'NARIÑO';
            $id[18]=54;
            $departamentos[18]= 'NORTE DE SANTANDER';
            $id[19]=63;
            $departamentos[19]= 'QUINDIO';
            $id[20]=66;
            $departamentos[20]= 'RISARALDA';
            $id[21]=68;
            $departamentos[21]= 'SANTANDER';
            $id[22]=70;
            $departamentos[22]= 'SUCRE';
            $id[23]=73;
            $departamentos[23]= 'TOLIMA';
            $id[24]=76;
            $departamentos[24]= 'VALLE DEL CAUCA';
            $id[25]=81;
            $departamentos[25]= 'ARAUCA';
            $id[26]=85;
            $departamentos[26]= 'CASANARE';
            $id[27]=86;
            $departamentos[27]= 'PUTUMAYO';
            $id[28]=88;
            $departamentos[28]= 'ARCHIPIÉLAGO DE SAN ANDRÉS, PROVIDENCIA Y SANTA CATALINA';
            $id[29]=91;
            $departamentos[29]= 'AMAZONAS';
            $id[30]=94;
            $departamentos[30]= 'GUAINÍA';
            $id[31]=95;
            $departamentos[31]= 'GUAVIARE';
            $id[32]=97;
            $departamentos[32]= 'VAUPÉS';
            $id[33]=99;
            $departamentos[33]= 'VICHADA';


        for ($i=1;$i<=33; $i++){
        
            DB::table('departamentos')->insert([

            'id' => $id[$i],
            'descripcion'=> $departamentos[$i],
            'paise_id'=> 1,

          ]);
        }


    }
}



