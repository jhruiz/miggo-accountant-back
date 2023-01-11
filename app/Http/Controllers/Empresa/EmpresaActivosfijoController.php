<?php

namespace App\Http\Controllers\Empresa;

use App\Models\Empresa;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class EmpresaActivosfijoController extends ApiController
{
    public function index(Empresa $empresa)
    {
        $activosfijos = $empresa->gruposactivosfijos()
        ->with('activosfijos')
        ->orderBy('id','DESC')
        ->get()
        ->unique()
        ->values();

        return $this->showAll($activosfijos);

    }
}
