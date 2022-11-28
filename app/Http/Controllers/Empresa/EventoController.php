<?php

namespace App\Http\Controllers\Empresa;

use App\Models\Evento;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;


class EventoController extends ApiController
{
    public function index()
    {
        $eventos = Evento::all();
        return $this->showall($eventos);
    }

    public function store(Request $request)
    {
        $evento = Evento::create($request->all());
        return $this->showOne($evento, 201);
    }

    public function show(Evento $evento)
    {
        return $this->showOne($evento);
    }

    public function update(Request $request, Evento $evento)
    {
        $evento->fill($request->all());
        $evento->save();
        return $this->showOne($evento);
    }

    public function destroy(Evento $evento)
    {
        $evento->delete($evento);
        return $this->showOne($evento);
    }
}
