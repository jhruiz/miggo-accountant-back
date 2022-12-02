<?php

namespace App\Http\Controllers\Cloudmenu;

use App\Models\Cloudmenu;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;


class CloudmenuController extends ApiController
{

    public function index()
    {
        $cloudmenus = Cloudmenu::all();
        
        $arrClMenu = [];
        foreach( $cloudmenus as $val ) {
            if( !empty($val['cloudmenu_id']) ){

               // dump($val['cloudmenu_id']);
                // dump($val);

                $arrClMenu[$val['cloudmenu_id']]['hijos'][$val['id']][] = $val['descripcion'];
                $arrClMenu[$val['cloudmenu_id']]['hijos'][$val['id']][] = $val['url'];
                $arrClMenu[$val['cloudmenu_id']]['hijos'][$val['id']][] = $val['imagen'];
                $arrClMenu[$val['cloudmenu_id']]['hijos'][$val['id']][] = $val['ayuda'];
                // $arrClMenu[$val['cloudmenu_id']]['hijos'][$val['id']][] = $val['orden'];

            } else {

                $arrClMenu[$val['id']]['descripcion'] = $val['descripcion']; 
                $arrClMenu[$val['id']]['imagen']= $val['imagen'];

            }
        }

        return response()->json($arrClMenu);
    }

}
