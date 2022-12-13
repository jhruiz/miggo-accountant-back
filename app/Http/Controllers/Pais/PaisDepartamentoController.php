<?php

namespace App\Http\Controllers\Pais;

use App\Models\Paise;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class PaisDepartamentoController extends ApiController
{

    public function index(Paise $paise)
    {
        $departamentos = $paise->departamentos()
        ->orderBy('descripcion','ASC')
        ->get()
        ->unique()
        ->values();

        return $this->showAll($departamentos);

    }


}
