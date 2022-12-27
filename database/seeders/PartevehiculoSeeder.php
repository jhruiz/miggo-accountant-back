<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartevehiculoSeeder extends Seeder
{
    public function run()
    {

        $descripcion[1] =	'GUARDABARRO DELANTERO';
        $extra[1] =	null;
        $descripcion[2] =	'VALVULAS';	
        $extra[2] =	null;
        $descripcion[3] =	'SILLIN';	
        $extra[3] =	null;
        $descripcion[4] =	'GUARDABARRO TRASERO'; 	
        $extra[4] =	null;
        $descripcion[5] =	'DIRECCIONAL DELANTERA';	
        $extra[5] =	null;
        $descripcion[6] =	'DIRECCIONAL TRASERA';	
        $extra[6] =	null;
        $descripcion[7] =	'LLANTA DELANTERA'; 	
        $extra[7] =	null;
        $descripcion[8] =	'RIN DELANTERO'; 	
        $extra[8] =	null;
        $descripcion[9] =	'LLANTA TRASERA';	
        $extra[9] =	null;
        $descripcion[10] =	'RIN TRASERO'; 	
        $extra[10] = null;
        $descripcion[11] =	'BABERO';	
        $extra[11] = null;
        $descripcion[12] =	'GUARDACADENA';	
        $extra[12] = null;
        $descripcion[13] =	'TANQUE';	
        $extra[13] = null;
        $descripcion[14] =	'RETROVISORES';	
        $extra[14] = null;
        $descripcion[15] =	'PLACA';	
        $extra[15] = null;
        $descripcion[16] =	'DIRECCION';	
        $extra[16] = null;
        $descripcion[17] =	'DIRECCIONALES';	
        $extra[17] = null;
        $descripcion[18] =	'STOP';	
        $extra[18] = null;
        $descripcion[19] =	'BOMBILLERIA';	
        $extra[19] = null;
        $descripcion[20] =	'PITO';	
        $extra[20] = null;
        $descripcion[21] =	'BATERIA';	
        $extra[21] = null;
        $descripcion[22] =	'COMANDO DE LUCES'; 
        $extra[22] = null;
        $descripcion[23] =	'FAROLA';	
        $extra[23] = null;
        $descripcion[24] =	'INTERRUPTORES FRENO DELANTERO';	
        $extra[24] = null;
        $descripcion[25] =	'INTERRUPTORES FRENO TRASERO'; 	
        $extra[25] = null;
        $descripcion[26] =	'MOTOR DE ARRANQUE'; 	
        $extra[26] = null;
        $descripcion[27] =	'SWITCH DE ENCENDIDO'; 	
        $extra[27] = null;
        $descripcion[28] =	'TAPA TAPON ACEITE'; 	
        $extra[28] = null;
        $descripcion[29] =	'CAJA DE CAMBIOS'; 	
        $extra[29] = null;
        $descripcion[30] =	'KIT DE ARRASTRE'; 	
        $extra[30] = null;
        $descripcion[31] =	'SISTEMA DE CHOQUE';	
        $extra[31] = null;
        $descripcion[32] =	'SISTEMA DE EMBRAGUE'; 	
        $extra[32] = null;
        $descripcion[33] =	'SUSPENCION DELANTERA'; 	
        $extra[33] = null;
        $descripcion[34] =	'AMORTIGUADOR TRASERO'; 
        $extra[34] = null;
        $descripcion[35] =	'SISTEMA DE FRENO DELANTERO'; 	
        $extra[35] = null;
        $descripcion[36] =	'SISTEMA DE FRENO TRASERO'; 
        $extra[36] = null;
        $descripcion[37] =	'ACELERADOR';	
        $extra[37] = null;
        $descripcion[38] =	'TACOMETRO';	
        $extra[38] = null;
        $descripcion[39] =	'SILENCIADOR';	
        $extra[39] = null;
        $descripcion[40] =	'CASCO';
        $extra[40] = 1;
        $descripcion[41] = 'HERRAMIENTAS-VARIOS';
        $extra[41] = 1;
        $descripcion[42] = 'DOCUMENTOS DEL VEHICULO';
        $extra[42] = 1;
        $descripcion[43] = 'LLAVES';
        $extra[43] = 1;
        $descripcion[44] = 'EXHOSTO';
        $extra[44] = 0;
        $descripcion[45] = 'ACEITE';
        $extra[45] = 0;
        $descripcion[46] = 'TEMPERATURA';
        $extra[46] = 0;
        $descripcion[47] = 'BATERIA';
        $extra[47] = 0;
        $descripcion[48] = 'ABS';
        $extra[48] = 0;
        $descripcion[49] = 'CHECK ENGINE';
        $extra[49] = 0;
        $descripcion[50] = 'SRS';
        $extra[50] = 0;
        $descripcion[51] = 'A/A';
        $extra[51] = 0;
        $descripcion[52] = 'ANTENA';
        $extra[52] = 0;
        $descripcion[53] = 'WIPER';
        $extra[53] = 0;
        $descripcion[54] = 'RADIO';
        $extra[54] = 0;
        $descripcion[55] = 'PLANTA';
        $extra[55] = 0;
        $descripcion[56] = 'CIGAR';
        $extra[56] = 0;
        $descripcion[57] = 'ALARMA';
        $extra[57] = 0;
        $descripcion[58] = 'CTRL ALARMA';
        $extra[58] = 0;
        $descripcion[59] = 'BQ CENTRAL';
        $extra[59] = 0;
        $descripcion[60] = 'MILLARE';
        $extra[60] = 0;
        $descripcion[61] = 'TAPETES';
        $extra[61] = 0;
        $descripcion[62] = 'TECHO';
        $extra[62] = 0;
        $descripcion[63] = 'CARTERA DELANTERA';
        $extra[63] = 0;
        $descripcion[64] = 'CARTERA TRASERA';
        $extra[64] = 0;
        $descripcion[65] = 'MANIJA INT. DEL.';
        $extra[65] = 0;
        $descripcion[66] = 'MANIJA INT. TRAS.';
        $extra[66] = 0;
        $descripcion[67] = 'MANIJA EXT. DEL';
        $extra[67] = 0;
        $descripcion[68] = 'MANIJA EXT. TRAS.';
        $extra[68] = 0;
        $descripcion[69] = 'VIDRIOS DEL.';
        $extra[69] = 0;
        $descripcion[70] = 'VIDRIOS TRAS.';
        $extra[70] = 0;
        $descripcion[71] = 'ESPEJO LAT.';
        $extra[71] = 0;
        $descripcion[72] = 'PLUMILLA';
        $extra[72] = 0;
        $descripcion[73] = 'LENTE FAROLAS';
        $extra[73] = 0;
        $descripcion[74] = 'LUCES MEDIAS';
        $extra[74] = 0;
        $descripcion[75] = 'LUCES ALTAS';
        $extra[75] = 0;
        $descripcion[76] = 'EXPLORADORAS';
        $extra[76] = 0;
        $descripcion[77] = 'ESTACIONARIAS';
        $extra[77] = 0;
        $descripcion[78] = 'PLUMILLAS TRASERAS';
        $extra[78] = 0;
        $descripcion[79] = 'GATO';
        $extra[79] = 1;
        $descripcion[80] = 'PALANCA G.';
        $extra[80] = 1;
        $descripcion[81] = 'LLAVE DE PERNOS';
        $extra[81] = 1;
        $descripcion[82] = 'LLANTA REPUESTO';
        $extra[82] = 1;
        $descripcion[83] = 'EQUIPO DE CARRETERA';
        $extra[83] = 1;
        $descripcion[84] = 'BANDEROLA';
        $extra[84] = 1;
        $descripcion[85] = 'CABLE INICIO';
        $extra[85] = 1;
        $descripcion[86] = 'CRUCETA';
        $extra[86] = 1;
        $descripcion[87] = 'EXTINTOR';
        $extra[87] = 1;
        $descripcion[88] = 'BOTIQUIN';
        $extra[88] = 1;

 
        for ($i=1;$i<=88; $i++){
        
            DB::table('partevehiculos')->insert([

            'id' => $i,
            'descripcion'=> $descripcion[$i],
            'extra'=> $extra[$i],

          ]);
        }
    }
}
