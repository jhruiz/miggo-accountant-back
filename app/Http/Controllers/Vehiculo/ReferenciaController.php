<?php

namespace App\Http\Controllers\Vehiculo;

use App\Models\Referencia;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ReferenciaController extends ApiController
{
    public function index()
    {
        $referencias = Referencia::all();
        return $this->showall($referencias);
    }

    public function store(Request $request)
    {
        $referencia = Referencia::create($request->all());
        return $this->showOne($referencia, 201);
    }

    public function show(Referencia $referencia)
    {
        return $this->showOne($referencia);
    }

    public function update(Request $request, Referencia $referencia)
    {
        $referencia->fill($request->all());
        $referencia->save();
        return $this->showOne($referencia);
    }

    public function destroy(Referencia $referencia)
    {
        $referencia->delete($referencia);
        return $this->showOne($referencia);
    }
}
