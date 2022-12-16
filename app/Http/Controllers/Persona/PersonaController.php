<?php

namespace App\Http\Controllers\Persona;

use App\Models\Persona;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;


class PersonaController extends ApiController
{
   
    public function index()
    {
        $personas = Persona::all();
        return $this->showall($personas);
    }

    public function store(Request $request)
    {
        $persona = Persona::create($request->all());
        return $this->showOne($persona, 201);
    }

    public function show(Persona $persona)
    {
        $persona->users;
        $persona->empleados;
        $persona->clientes;
        $persona->proveedores;
        return $this->showOne($persona);
    }

    public function update(Request $request, Persona $persona)
    {
        $persona->fill($request->all());
        $persona->save();
        return $this->showOne($persona);
    }

    public function destroy(Persona $persona)
    {
        $persona->delete($persona);
        return $this->showOne($persona);
    }
}
