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

                $arrClMenu[$val['cloudmenu_id']]['hijos'][$val['id']] = $val['descripcion'];
                $arrClMenu[$val['cloudmenu_id']]['hijos'][$val['id']] = $val['url'];
                $arrClMenu[$val['cloudmenu_id']]['hijos'][$val['id']] = $val['imagen'];
                $arrClMenu[$val['cloudmenu_id']]['hijos'][$val['id']] = $val['ayuda'];

            } else {

                $arrClMenu[$val['id']]['descripcion'] = $val['descripcion']; 

            }
        }

        return response()->json($arrClMenu);
    }

}
