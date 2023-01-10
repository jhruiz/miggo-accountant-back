<?php

namespace App\Http\Controllers\Activo;

use App\Models\Estadoactivo;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class EstadoactivoController extends ApiController
{

    public function index()
    {
        $estadoactivos = Estadoactivo::all();
        return $this->showall($estadoactivos);
    }

    public function store(Request $request)
    {
        $estadoactivo = Estadoactivo::create($request->all());

        if($request->has('creador_id')){
            $estadoactivo->creador_id = $request->creador_id;
        }
        $estadoactivo->save();

        return $this->showOne($estadoactivo, 201);
    }

    public function show(Estadoactivo $estadoactivo)
    {
        return $this->showOne($estadoactivo);
    }

    public function update(Request $request, Estadoactivo $estadoactivo)
    {
        $estadoactivo->fill($request->all());
        $estadoactivo->save();
        return $this->showOne($estadoactivo);
    }

    public function destroy(Estadoactivo $estadoactivo)
    {
        $estadoactivo->delete($estadoactivo);
        return $this->showOne($estadoactivo);
    }
}
