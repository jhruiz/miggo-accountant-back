<?php

namespace App\Http\Controllers\Empresa;

use App\Models\Empresa;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Models\Tercero;

class EmpresaEmpleadoController extends ApiController
{
    public function index(Request $request, Empresa $empresa) 
    {
        $search = $request->search;
        $empleados = $empresa->empleados()
        ->with('tercero')
        ->orderBy('id','DESC')
        ->get()
        ->pluck('tercero')
        ->pluck('id')
        ->unique()
        ->values();

        // return response()->json($empleados);

        if($search != ''){
            $terceros = Tercero::orderby('nombres','asc')->select('id','nombres')
            ->whereIn('id', $empleados)
            ->where('nombres', 'like', '%' .$search . '%')
            ->orwhere('identificacion', 'like', '%' .$search . '%')
            ->limit(10)->get();
        }

        $response = array();
        foreach($terceros as $tercero){
           $response[] = array("value"=>$tercero->id,"label"=>$tercero->nombres);
        }

        return response()->json($response);

    }
}
