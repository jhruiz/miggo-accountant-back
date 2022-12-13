<?php

namespace App\Http\Controllers\Pais;

use App\Http\Controllers\ApiController;
use App\Models\Departamento;
use Illuminate\Http\Request;


class DepartamentoCiudadeController extends ApiController
{
    public function index(Departamento $departamento)
    {
        $ciudades = $departamento->ciudades()
        ->orderBy('descripcion','ASC')
        ->get()
        ->unique()
        ->values();

        return $this->showAll($ciudades);

    }
}
