<?php

namespace App\Http\Controllers\Empresa;

use App\Models\Empresa;
use App\Models\Perfile;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class EmpresaPerfileController extends ApiController
{
    public function index(Empresa $empresa)
    {
        $perfiles = $empresa->perfiles()
        ->OrderBy('descripcion','ASC') 
        ->get();
        
        return $this->showAll($perfiles);

    }

    public function store(Request $request, Empresa $empresa)
    {
        $perfile = new Perfile();
        if($request->has('descripcion')){
            $perfile->descripcion = $request->descripcion;
            $perfile->empresa_id = $empresa->id;
            $perfile->save();
        }
        $perfile->empresa;
        return $this->showOne($perfile);
    }

}
