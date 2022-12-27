<?php

namespace App\Http\Controllers\Vehiculo;

use App\Models\Vehiculo;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class VehiculoController extends ApiController //TODO: Validaciones
{

    public function store(Request $request)
    {
        $vehiculo = Vehiculo::create($request->all());
        $vehiculo->marcavehiculo;
        $vehiculo->tipovehiculo;
        $vehiculo->referencia;
        return $this->showOne($vehiculo, 201);
    }

    public function show(Vehiculo $vehiculo)
    {
        $vehiculo->marcavehiculo;
        $vehiculo->tipovehiculo;
        $vehiculo->referencia;
        return $this->showOne($vehiculo);
    }

    public function update(Request $request, Vehiculo $vehiculo)
    {
        $vehiculo->fill($request->all());
        $vehiculo->save();
        $vehiculo->marcavehiculo;
        $vehiculo->tipovehiculo;
        $vehiculo->referencia;
        return $this->showOne($vehiculo);
    }

    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete($vehiculo);
        $vehiculo->marcavehiculo;
        $vehiculo->tipovehiculo;
        $vehiculo->referencia;
        return $this->showOne($vehiculo);
    }
}
