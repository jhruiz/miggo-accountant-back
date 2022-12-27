<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarcavehiculoSeeder extends Seeder
{
    public function run()
    {

        $descripcion[1]	= 'KTM';
        $descripcion[2]	= 'KAWASAKI';
        $descripcion[3]	= 'AKT';
        $descripcion[4]	= 'APRILIA';
        $descripcion[5]	= 'BAJAJ';
        $descripcion[6]	= 'BENELLI';
        $descripcion[7]	= 'BMW';
        $descripcion[8]	= 'CAGIVA';
        $descripcion[9]	= 'CAN-AM';
        $descripcion[10] = 'CF MOTO'; 
        $descripcion[11] = 'CHEVROLET';
        $descripcion[12] = 'DUCATTI';
        $descripcion[13] = 'FORD';
        $descripcion[14] = 'HERO';
        $descripcion[15] = 'HONDA';
        $descripcion[16] = 'JIALING';
        $descripcion[17] = 'KEEWAI';
        $descripcion[18] = 'KIA';
        $descripcion[19] = 'KYMCO';
        $descripcion[20] = 'PULSAR';
        $descripcion[21] = 'QINGQI';
        $descripcion[22] = 'SACH BIKE'; 
        $descripcion[23] = 'SUZUKI';
        $descripcion[24] = 'TONGKO';
        $descripcion[25] = 'TOYOTA';
        $descripcion[26] = 'TVS';
        $descripcion[27] = 'YAMAHA';
        $descripcion[28] = 'AUTECO';
        $descripcion[29] = 'MAURICE GARAGE'; 
        $descripcion[30] = 'COBRA';
        $descripcion[31] = 'ROYAL ENFIELD'; 
        $descripcion[32] = 'RENAULT';
        $descripcion[33] = 'MAZDA';
        $descripcion[34] = 'UM';
        $descripcion[35] = 'VICTORY';
        $descripcion[36] = 'MITSUBISHI';
        $descripcion[37] = 'LIFAN';
        $descripcion[38] = 'FORD ECO SPORT'; 
        $descripcion[39] = 'MERCEDES BENZ'; 
        $descripcion[40] = 'UKM';
        $descripcion[41] = 'HYUNDAI';
        $descripcion[42] = 'BRP/CAN AM';
        $descripcion[43] = 'TRIUMPH';
        $descripcion[44] = 'NISSAN';
        $descripcion[45] = 'UNITED MOTORS';
        $descripcion[46] = 'HUSQVARNA';
        $descripcion[47] = 'HARLEY DAVIDSON'; 
        $descripcion[48] = 'VESPA';
        $descripcion[49] = 'AYCO';
        $descripcion[50] = 'MOTO ABC'; 
        $descripcion[51] = 'RENAULT';
        $descripcion[52] = 'SYM';
        
 
        for ($i=1;$i<=52; $i++){
        
            DB::table('marcavehiculos')->insert([

            'id' => $i,
            'descripcion'=> $descripcion[$i],

          ]);
        }
    }
}
