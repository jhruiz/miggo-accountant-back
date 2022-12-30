<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CiiuseccioneSeeder extends Seeder
{
    public function run()
    {
        $nombres[1] = 'SECCIÓN A';	
        $descripcion[1] = 'AGRICULTURA, GANADERÍA, CAZA, SILVICULTURA Y PESCA';
        $nombres[2] = 'SECCIÓN B';	
        $descripcion[2] = 'EXPLOTACIÓN DE MINAS Y CANTERAS';
        $nombres[3] = 'SECCIÓN C';	
        $descripcion[3] = 'INDUSTRIAS MANUFACTURERAS';
        $nombres[4] = 'SECCIÓN D';	
        $descripcion[4] = 'SUMINISTRO DE ELECTRICIDAD, GAS, VAPOR Y AIRE ACONDICIONADO';
        $nombres[5] = 'SECCIÓN E';	
        $descripcion[5] = 'DISTRIBUCIÓN DE AGUA; EVACUACIÓN Y TRATAMIENTO DE AGUAS RESIDUALES, GESTIÓN DE DESECHOS Y ACTIVIDADES DE SANEAMIENTO AMBIENTAL';
        $nombres[6] = 'SECCIÓN F';	
        $descripcion[6] = 'CONSTRUCCIÓN';
        $nombres[7] = 'SECCIÓN G';	
        $descripcion[7] = 'COMERCIO AL POR MAYOR Y AL POR MENOR; REPARACIÓN DE VEHÍCULOS AUTOMOTORES Y MOTOCICLETAS';
        $nombres[8] = 'SECCIÓN H';	
        $descripcion[8] = 'TRANSPORTE Y ALMACENAMIENTO';
        $nombres[9] = 'SECCIÓN I';	
        $descripcion[9] = 'ALOJAMIENTO Y SERVICIOS DE COMIDA';
        $nombres[10] = 'SECCIÓN J';	
        $descripcion[10] = 'INFORMACIÓN Y COMUNICACIONES';
        $nombres[11] = 'SECCIÓN K';	
        $descripcion[11] = 'ACTIVIDADES FINANCIERAS Y DE SEGUROS';
        $nombres[12] = 'SECCIÓN L';	
        $descripcion[12] = 'ACTIVIDADES INMOBILIARIAS';
        $nombres[13] = 'SECCIÓN M';	
        $descripcion[13] = 'ACTIVIDADES PROFESIONALES, CIENTÍFICAS Y TÉCNICAS';
        $nombres[14] = 'SECCIÓN N';	
        $descripcion[14] = 'ACTIVIDADES DE SERVICIOS ADMINISTRATIVOS Y DE APOYO';
        $nombres[15] = 'SECCIÓN O';	
        $descripcion[15] = 'ADMINISTRACIÓN PÚBLICA Y DEFENSA; PLANES DE SEGURIDAD SOCIAL DE AFILIACIÓN OBLIGATORIA';
        $nombres[16] = 'SECCIÓN P';	
        $descripcion[16] = 'EDUCACIÓN';
        $nombres[17] = 'SECCIÓN Q';	
        $descripcion[17] = 'ACTIVIDADES DE ATENCIÓN DE LA SALUD HUMANA Y DE ASISTENCIA SOCIAL';
        $nombres[18] = 'SECCIÓN R'; 	
        $descripcion[18] = 'ACTIVIDADES ARTÍSTICAS, DE ENTRETENIMIENTO Y RECREACIÓN';
        $nombres[19] = 'SECCIÓN S';	
        $descripcion[19] = 'OTRAS ACTIVIDADES DE SERVICIOS';
        $nombres[20] = 'SECCIÓN T'; 	
        $descripcion[20] = 'ACTIVIDADES DE LOS HOGARES INDIVIDUALES EN CALIDAD DE EMPLEADORES; ACTIVIDADES NO DIFERENCIADAS DE LOS HOGARES INDIVIDUALES COMO PRODUCTORES DE BIENES Y SERVICIOS PARA USO PROPIO';
        $nombres[21] = 'SECCIÓN U';	
        $descripcion[21] = 'ACTIVIDADES DE ORGANIZACIONES Y ENTIDADES EXTRATERRITORIALES';
         

        for ($i=1;$i<=21; $i++){
        
            DB::table('ciiusecciones')->insert([

            'id' => $i,
            'nombre' => $nombres[$i],
            'descripcion'=> $descripcion[$i],

          ]);
        }
    }
}
