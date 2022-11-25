<?php

namespace App\Http\Controllers\Empresa;

use App\Models\Auditoria;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;


class AuditoriaController extends ApiController
{
    public function index()
    {
        $auditorias = Auditoria::all();
        return $this->showall($auditorias);
    }

    public function show(Auditoria $auditoria)
    {
        return $this->showOne($auditoria);
    }

}
