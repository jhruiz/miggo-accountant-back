<?php

namespace App\Http\Controllers\Empresa;

use Illuminate\Http\Request;
use App\Models\Unidadesmedida;
use App\Http\Controllers\ApiController;

class UnidadesmedidaController extends ApiController
{
    public function index()
    {
        $unidadesmedidas = Unidadesmedida::all();
        return $this->showall($unidadesmedidas);
    }

    public function store(Request $request)
    {
        $unidadesmedida = Unidadesmedida::create($request->all());
        return $this->showOne($unidadesmedida, 201);
    }

    public function show(Unidadesmedida $unidadesmedida)
    {
        return $this->showOne($unidadesmedida);
    }

    public function update(Request $request, Unidadesmedida $unidadesmedida)
    {
        $unidadesmedida->fill($request->all());
        $unidadesmedida->save();
        return $this->showOne($unidadesmedida);
    }

    public function destroy(Unidadesmedida $unidadesmedida)
    {
        $unidadesmedida->delete($unidadesmedida);
        return $this->showOne($unidadesmedida);
    }
}
