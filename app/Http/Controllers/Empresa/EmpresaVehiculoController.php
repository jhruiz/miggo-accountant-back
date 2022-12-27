<?php

namespace App\Http\Controllers\Empresa;

use App\Models\Empresa;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class EmpresaVehiculoController extends ApiController
{
    public function index(Empresa $empresa)
    {
        $vehiculos = $empresa->vehiculos()
        ->with('marcavehiculo')
        ->with('tipovehiculo')
        ->with('referencia')
        ->orderBy('id','DESC')
        ->get()
        ->unique()
        ->values();

        return $this->showAll($vehiculos);

    }
}
