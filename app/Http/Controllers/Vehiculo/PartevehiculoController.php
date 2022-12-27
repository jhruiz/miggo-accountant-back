<?php

namespace App\Http\Controllers\Vehiculo;

use App\Models\Partevehiculo;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;


class PartevehiculoController extends ApiController
{
    public function index()
    {
        $partevehiculos = Partevehiculo::all();
        return $this->showall($partevehiculos);
    }

    public function store(Request $request)
    {
        $partevehiculo = Partevehiculo::create($request->all());
        return $this->showOne($partevehiculo, 201);
    }

    public function show(Partevehiculo $partevehiculo)
    {
        return $this->showOne($partevehiculo);
    }

    public function update(Request $request, Partevehiculo $partevehiculo)
    {
        $partevehiculo->fill($request->all());
        $partevehiculo->save();
        return $this->showOne($partevehiculo);
    }

    public function destroy(Partevehiculo $partevehiculo)
    {
        $partevehiculo->delete($partevehiculo);
        return $this->showOne($partevehiculo);
    }
}
