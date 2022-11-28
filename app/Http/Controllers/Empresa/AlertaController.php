<?php

namespace App\Http\Controllers\Empresa;

use App\Models\Alerta;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;


class AlertaController extends ApiController
{
    public function index()
    {
        $alertas = Alerta::all();
        return $this->showall($alertas);
    }

    public function store(Request $request)
    {
        $alerta = Alerta::create($request->all());
        return $this->showOne($alerta, 201);
    }

    public function show(Alerta $alerta)
    {
        return $this->showOne($alerta);
    }

    public function update(Request $request, Alerta $alerta)
    {
        $alerta->fill($request->all());
        $alerta->save();
        return $this->showOne($alerta);
    }

    public function destroy(Alerta $alerta)
    {
        $alerta->delete($alerta);
        return $this->showOne($alerta);
    }
}
