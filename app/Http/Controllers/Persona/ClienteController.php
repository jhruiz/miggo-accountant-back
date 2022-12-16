<?php

namespace App\Http\Controllers\Persona;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ClienteController extends ApiController
{
      
    public function index()
    {
        $clientes = Cliente::all();
        return $this->showall($clientes);
    }

    public function store(Request $request)
    {
        $cliente = Cliente::create($request->all());
        return $this->showOne($cliente, 201);
    }

    public function show(Cliente $cliente)
    {
        return $this->showOne($cliente);
    }

    public function update(Request $request, Cliente $cliente)
    {
        $cliente->fill($request->all());
        $cliente->save();
        return $this->showOne($cliente);
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete($cliente);
        return $this->showOne($cliente);
    }
}
