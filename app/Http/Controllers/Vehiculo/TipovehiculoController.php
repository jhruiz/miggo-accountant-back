<?php

namespace App\Http\Controllers\Vehiculo;

use App\Models\Tipovehiculo;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class TipovehiculoController extends ApiController
{
    public function index()
    {
        $tipovehiculos = Tipovehiculo::all();
        return $this->showall($tipovehiculos);
    }

    public function store(Request $request)
    {
        $tipovehiculo = Tipovehiculo::create($request->all());
        return $this->showOne($tipovehiculo, 201);
    }

    public function show(Tipovehiculo $tipovehiculo)
    {
        return $this->showOne($tipovehiculo);
    }

    public function update(Request $request, Tipovehiculo $tipovehiculo)
    {
        $tipovehiculo->fill($request->all());
        $tipovehiculo->save();
        return $this->showOne($tipovehiculo);
    }

    public function destroy(Tipovehiculo $tipovehiculo)
    {
        $tipovehiculo->delete($tipovehiculo);
        return $this->showOne($tipovehiculo);
    }
}
