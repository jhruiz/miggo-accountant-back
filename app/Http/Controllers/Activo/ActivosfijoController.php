<?php

namespace App\Http\Controllers\Activo;

use Illuminate\Http\Request;
use App\Models\Activosfijo;
use App\Http\Controllers\ApiController;

class ActivosfijoController extends ApiController
{
    public function index()
    {
        $activosfijos = Activosfijo::all();
        return $this->showall($activosfijos);
    }

    public function store(Request $request)
    {
        $activosfijo = Activosfijo::create($request->all());
        return $this->showOne($activosfijo, 201);
    }

    public function show(Activosfijo $activosfijo)
    {
        return $this->showOne($activosfijo);
    }

    public function update(Request $request, Activosfijo $activosfijo)
    {
        $activosfijo->fill($request->all());
        $activosfijo->save();
        return $this->showOne($activosfijo);
    }

    public function destroy(Activosfijo $activosfijo)
    {
        $activosfijo->delete($activosfijo);
        return $this->showOne($activosfijo);
    }
}
