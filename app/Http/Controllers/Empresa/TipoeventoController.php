<?php

namespace App\Http\Controllers\Empresa;

use App\Models\Tipoevento;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;


class TipoeventoController extends ApiController
{
    public function index()
    {
        $Tipoeventos = Tipoevento::all();
        return $this->showall($Tipoeventos);
    }

    public function store(Request $request)
    {
        $tipoevento = Tipoevento::create($request->all());
        return $this->showOne($tipoevento, 201);
    }

    public function show(Tipoevento $tipoevento)
    {
        return $this->showOne($tipoevento);
    }

    public function update(Request $request, Tipoevento $tipoevento)
    {
        $tipoevento->fill($request->all());
        $tipoevento->save();
        return $this->showOne($tipoevento);
    }

    public function destroy(Tipoevento $tipoevento)
    {
        $tipoevento->delete($tipoevento);
        return $this->showOne($tipoevento);
    }
}
