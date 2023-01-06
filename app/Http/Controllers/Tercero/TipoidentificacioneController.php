<?php

namespace App\Http\Controllers\Persona;

use Illuminate\Http\Request;
use App\Models\Tipoidentificacione;
use App\Http\Controllers\ApiController;

class TipoidentificacioneController extends ApiController
{
    public function index()
    {
        return $this->showAll(Tipoidentificacione::all());
    }

    public function show(Tipoidentificacione $tipoidentificacione)
    {
        return $this->showOne($tipoidentificacione);
    }
}
