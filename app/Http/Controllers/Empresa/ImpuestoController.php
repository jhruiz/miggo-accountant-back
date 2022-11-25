<?php

namespace App\Http\Controllers\Empresa;

use App\Models\Impuesto;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ImpuestoController extends ApiController
{
    public function index()
    {
        $impuestos = Impuesto::all();
        return $this->showall($impuestos);
    }

    public function store(Request $request)
    {
        $impuesto = Impuesto::create($request->all());
        return $this->showOne($impuesto, 201);
    }

    public function show(Impuesto $impuesto)
    {
        return $this->showOne($impuesto);
    }

    public function update(Request $request, Impuesto $impuesto)
    {
        $impuesto->fill($request->all());
        $impuesto->save();
        return $this->showOne($impuesto);
    }

    public function destroy(Impuesto $impuesto)
    {
        $impuesto->delete($impuesto);
        return $this->showOne($impuesto);
    }
}
