<?php

namespace App\Http\Controllers\Activo;

use Illuminate\Http\Request;
use App\Models\Gruposactivosfijo;
use App\Http\Controllers\ApiController;

class GruposactivosfijoController extends ApiController
{
    public function index()
    {
        $gruposactivosfijos = Gruposactivosfijo::all();
        return $this->showall($gruposactivosfijos);
    }

    public function store(Request $request)
    {
        $gruposactivosfijo = Gruposactivosfijo::create($request->all());
        if($request->has('creador_id')){
            $gruposactivosfijo->creador_id = $request->creador_id;
        }
        $gruposactivosfijo->save();
        return $this->showOne($gruposactivosfijo, 201);
    }

    public function show(Gruposactivosfijo $gruposactivosfijo)
    {
        return $this->showOne($gruposactivosfijo);
    }

    public function update(Request $request, Gruposactivosfijo $gruposactivosfijo)
    {
        $gruposactivosfijo->fill($request->all());
        $gruposactivosfijo->save();
        return $this->showOne($gruposactivosfijo);
    }

    public function destroy(Gruposactivosfijo $gruposactivosfijo)
    {
        $gruposactivosfijo->delete($gruposactivosfijo);
        return $this->showOne($gruposactivosfijo);
    }
}
