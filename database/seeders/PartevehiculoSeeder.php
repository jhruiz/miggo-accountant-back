<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartevehiculoSeeder extends Seeder
{
    public function run()
    {

        $descripcion[7] =	'GUARDABARRO DELANTERO';
        $extra[7] =	null;
        $descripcion[8] =	'VALVULAS';	
        $extra[8] =	null;
        $descripcion[9] =	'SILLIN';	
        $extra[9] =	null;
        $descripcion[10] =	'GUARDABARRO TRASERO'; 	
        $extra[10] =	null;
        $descripcion[11] =	'DIRECCIONAL DELANTERA';	
        $extra[11] =	null;
        $descripcion[12] =	'DIRECCIONAL TRASERA';	
        $extra[12] =	null;
        $descripcion[13] =	'LLANTA DELANTERA'; 	
        $extra[13] =	null;
        $descripcion[14] =	'RIN DELANTERO'; 	
        $extra[14] =	null;
        $descripcion[15] =	'LLANTA TRASERA';	
        $extra[15] =	null;
        $descripcion[16] =	'RIN TRASERO'; 	
        $extra[16] = null;
        $descripcion[17] =	'BABERO';	
        $extra[17] = null;
        $descripcion[18] =	'GUARDACADENA';	
        $extra[18] = null;
        $descripcion[19] =	'TANQUE';	
        $extra[19] = null;
        $descripcion[20] =	'RETROVISORES';	
        $extra[20] = null;
        $descripcion[21] =	'PLACA';	
        $extra[21] = null;
        $descripcion[22] =	'DIRECCION';	
        $extra[22] = null;
        $descripcion[23] =	'DIRECCIONALES';	
        $extra[23] = null;
        $descripcion[24] =	'STOP';	
        $extra[24] = null;
        $descripcion[25] =	'BOMBILLERIA';	
        $extra[25] = null;
        $descripcion[26] =	'PITO';	
        $extra[26] = null;
        $descripcion[27] =	'BATERIA';	
        $extra[27] = null;
        $descripcion[28] =	'vacio';	
        $extra[28] = null;
        $descripcion[29] =	'COMANDO DE LUCES'; 
        $extra[29] = null;
        $descripcion[30] =	'FAROLA';	
        $extra[30] = null;
        $descripcion[31] =	'INTERRUPTORES FRENO DELANTERO';	
        $extra[31] = null;
        $descripcion[32] =	'INTERRUPTORES FRENO TRASERO'; 	
        $extra[32] = null;
        $descripcion[33] =	'MOTOR DE ARRANQUE'; 	
        $extra[33] = null;
        $descripcion[34] =	'SWITCH DE ENCENDIDO'; 	
        $extra[34] = null;
        $descripcion[35] =	'TAPA TAPON ACEITE'; 	
        $extra[35] = null;
        $descripcion[36] =	'CAJA DE CAMBIOS'; 	
        $extra[36] = null;
        $descripcion[37] =	'KIT DE ARRASTRE'; 	
        $extra[37] = null;
        $descripcion[38] =	'SISTEMA DE CHOQUE';	
        $extra[38] = null;
        $descripcion[39] =	'SISTEMA DE EMBRAGUE'; 	
        $extra[39] = null;
        $descripcion[40] =	'SUSPENCION DELANTERA'; 	
        $extra[40] = null;
        $descripcion[41] =	'AMORTIGUADOR TRASERO'; 
        $extra[41] = null;
        $descripcion[42] =	'SISTEMA DE FRENO DELANTERO'; 	
        $extra[42] = null;
        $descripcion[43] =	'SISTEMA DE FRENO TRASERO'; 
        $extra[43] = null;
        $descripcion[44] =	'ACELERADOR';	
        $extra[44] = null;
        $descripcion[45] =	'TACOMETRO';	
        $extra[45] = null;
        $descripcion[46] =	'SILENCIADOR';	
        $extra[46] = null;
        $descripcion[47] =	'CASCO';
        $extra[47] = 1;
        $descripcion[48] = 'HERRAMIENTAS-VARIOS';
        $extra[48] = 1;
        $descripcion[49] = 'DOCUMENTOS DEL VEHICULO';
        $extra[49] = 1;
        $descripcion[50] = 'LLAVES';
        $extra[50] = 1;
        $descripcion[51] = 'vacio';
        $extra[51] = 0;
        $descripcion[52] = 'EXHOSTO';
        $extra[52] = 0;
        $descripcion[53] = 'ACEITE';
        $extra[53] = 0;
        $descripcion[54] = 'TEMPERATURA';
        $extra[54] = 0;
        $descripcion[55] = 'BATERIA';
        $extra[55] = 0;
        $descripcion[56] = 'ABS';
        $extra[56] = 0;
        $descripcion[57] = 'CHECK ENGINE';
        $extra[57] = 0;
        $descripcion[58] = 'SRS';
        $extra[58] = 0;
        $descripcion[59] = 'A/A';
        $extra[59] = 0;
        $descripcion[60] = 'ANTENA';
        $extra[60] = 0;
        $descripcion[61] = 'WIPER';
        $extra[61] = 0;
        $descripcion[62] = 'RADIO';
        $extra[62] = 0;
        $descripcion[63] = 'PLANTA';
        $extra[63] = 0;
        $descripcion[64] = 'CIGAR';
        $extra[64] = 0;
        $descripcion[65] = 'ALARMA';
        $extra[65] = 0;
        $descripcion[66] = 'CTRL ALARMA';
        $extra[66] = 0;
        $descripcion[67] = 'BQ CENTRAL';
        $extra[67] = 0;
        $descripcion[68] = 'MILLARE';
        $extra[68] = 0;
        $descripcion[69] = 'TAPETES';
        $extra[69] = 0;
        $descripcion[70] = 'TECHO';
        $extra[70] = 0;
        $descripcion[71] = 'CARTERA DELANTERA';
        $extra[71] = 0;
        $descripcion[72] = 'CARTERA TRASERA';
        $extra[72] = 0;
        $descripcion[73] = 'MANIJA INT. DEL.';
        $extra[73] = 0;
        $descripcion[74] = 'MANIJA INT. TRAS.';
        $extra[74] = 0;
        $descripcion[75] = 'MANIJA EXT. DEL';
        $extra[75] = 0;
        $descripcion[76] = 'MANIJA EXT. TRAS.';
        $extra[76] = 0;
        $descripcion[77] = 'VIDRIOS DEL.';
        $extra[77] = 0;
        $descripcion[78] = 'VIDRIOS TRAS.';
        $extra[78] = 0;
        $descripcion[79] = 'ESPEJO LAT.';
        $extra[79] = 0;
        $descripcion[80] = 'PLUMILLA';
        $extra[80] = 0;
        $descripcion[81] = 'LENTE FAROLAS';
        $extra[81] = 0;
        $descripcion[82] = 'LUCES MEDIAS';
        $extra[82] = 0;
        $descripcion[83] = 'LUCES ALTAS';
        $extra[83] = 0;
        $descripcion[84] = 'EXPLORADORAS';
        $extra[84] = 0;
        $descripcion[85] = 'vacio';
        $extra[85] = 0;
        $descripcion[86] = 'ESTACIONARIAS';
        $extra[86] = 0;
        $descripcion[87] = 'vacio';
        $extra[87] = 0;
        $descripcion[88] = 'PLUMILLAS TRASERAS';
        $extra[88] = 0;
        $descripcion[89] = 'GATO';
        $extra[89] = 1;
        $descripcion[90] = 'PALANCA G.';
        $extra[90] = 1;
        $descripcion[91] = 'LLAVE DE PERNOS';
        $extra[91] = 1;
        $descripcion[92] = 'LLANTA REPUESTO';
        $extra[92] = 1;
        $descripcion[93] = 'EQUIPO DE CARRETERA';
        $extra[93] = 1;
        $descripcion[94] = 'BANDEROLA';
        $extra[94] = 1;
        $descripcion[95] = 'CABLE INICIO';
        $extra[95] = 1;
        $descripcion[96] = 'CRUCETA';
        $extra[96] = 1;
        $descripcion[97] = 'EXTINTOR';
        $extra[97] = 1;
        $descripcion[98] = 'BOTIQUIN';
        $extra[98] = 1;

 
        for ($i=7;$i<=98; $i++){
        
            DB::table('partevehiculos')->insert([

            'id' => $i,
            'descripcion'=> $descripcion[$i],
            'extra'=> $extra[$i],

          ]);
        }

        $sql = database_path($path= 'precarga_estatica/miggo_partevehiculos_tipovehiculos.sql');
        DB::unprepared(file_get_contents($sql));
    }
}
