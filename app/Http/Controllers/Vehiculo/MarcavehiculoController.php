<?php

namespace App\Http\Controllers\Vehiculo;

use App\Models\Marcavehiculo;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class MarcavehiculoController extends ApiController
{
    public function index()
    {
        $marcavehiculos = Marcavehiculo::all();
        return $this->showall($marcavehiculos);
    }

    public function store(Request $request)
    {
        $marcavehiculo = Marcavehiculo::create($request->all());
        return $this->showOne($marcavehiculo, 201);
    }

    public function show(Marcavehiculo $marcavehiculo)
    {
        return $this->showOne($marcavehiculo);
    }

    public function update(Request $request, Marcavehiculo $marcavehiculo)
    {
        $marcavehiculo->fill($request->all());
        $marcavehiculo->save();
        return $this->showOne($marcavehiculo);
    }

    public function destroy(Marcavehiculo $marcavehiculo)
    {
        $marcavehiculo->delete($marcavehiculo);
        return $this->showOne($marcavehiculo);
    }
}
