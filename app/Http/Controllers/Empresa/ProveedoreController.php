<?php

namespace App\Http\Controllers\Empresa;

use App\Models\Proveedore;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ProveedoreController extends ApiController
{
    public function index()
    {
        $proveedores = Proveedore::all();
        return $this->showall($proveedores);
    }

    public function store(Request $request)
    {
        $proveedore = Proveedore::create($request->all());
        return $this->showOne($proveedore, 201);
    }

    public function show(Proveedore $proveedore)
    {
        return $this->showOne($proveedore);
    }

    public function update(Request $request, Proveedore $proveedore)
    {
        $proveedore->fill($request->all());
        $proveedore->save();
        return $this->showOne($proveedore);
    }

    public function destroy(Proveedore $proveedore)
    {
        $proveedore->delete($proveedore);
        return $this->showOne($proveedore);
    }
}
