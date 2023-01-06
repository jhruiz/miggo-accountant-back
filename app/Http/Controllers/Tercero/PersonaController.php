<?php

namespace App\Http\Controllers\Tercero;

use App\Models\Tercero;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class TerceroController extends ApiController
{
   
    public function index()
    {
        $terceros = Tercero::all();
        return $this->showall($terceros);
    }

    public function store(Request $request)
    {
        $tercero = Tercero::create($request->all());
        return $this->showOne($tercero, 201);
    }

    public function show(Tercero $tercero)
    {
        $tercero->users;
        $tercero->empleados;
        $tercero->clientes;
        $tercero->proveedores;
        return $this->showOne($tercero);
    }

    public function update(Request $request, Tercero $tercero)
    {
        $tercero->fill($request->all());
        $tercero->save();
        return $this->showOne($tercero);
    }

    public function destroy(Tercero $tercero)
    {
        $tercero->delete($tercero);
        return $this->showOne($tercero);
    }
}
