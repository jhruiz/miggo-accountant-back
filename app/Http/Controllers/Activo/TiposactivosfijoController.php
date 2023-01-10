<?php

namespace App\Http\Controllers\Activo;

use Illuminate\Http\Request;
use App\Models\Tiposactivosfijo;
use App\Http\Controllers\ApiController;

class TiposactivosfijoController extends ApiController
{
    public function index()
    {
        $tiposactivosfijos = Tiposactivosfijo::all();
        return $this->showall($tiposactivosfijos);
    }

    public function store(Request $request)
    {
        $tiposactivosfijo = Tiposactivosfijo::create($request->all());

        if($request->has('creador_id')){
            $tiposactivosfijo->creador_id = $request->creador_id;
        }
        $tiposactivosfijo->save();

        return $this->showOne($tiposactivosfijo, 201);
    }

    public function show(Tiposactivosfijo $tiposactivosfijo)
    {
        return $this->showOne($tiposactivosfijo);
    }

    public function update(Request $request, Tiposactivosfijo $tiposactivosfijo)
    {
        $tiposactivosfijo->fill($request->all());
        $tiposactivosfijo->save();
        return $this->showOne($tiposactivosfijo);
    }

    public function destroy(Tiposactivosfijo $tiposactivosfijo)
    {
        $tiposactivosfijo->delete($tiposactivosfijo);
        return $this->showOne($tiposactivosfijo);
    }
}
