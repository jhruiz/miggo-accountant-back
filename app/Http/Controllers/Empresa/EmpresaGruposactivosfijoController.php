<?php

namespace App\Http\Controllers\Empresa;

use App\Models\Empresa;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;


class EmpresaGruposactivosfijoController extends ApiController
{
    public function index(Empresa $empresa)
    {
        $gruposactivosfijos = $empresa->gruposactivosfijos()
        // ->with('')
        ->orderBy('id','DESC')
        ->get()
        ->unique()
        ->values();

        return $this->showAll($gruposactivosfijos);

    }
}
