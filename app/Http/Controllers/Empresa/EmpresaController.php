<?php

namespace App\Http\Controllers\Empresa;

use App\Models\Empresa;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class EmpresaController extends ApiController
{
   
    public function index()
    {
        $empresas = Empresa::all();
        return $this->showall($empresas);
    }

    public function store(Request $request)
    {
        $empresa = Empresa::create($request->all());
        return $this->showOne($empresa, 201);
    }

    public function show(Empresa $empresa)
    {
        return $this->showOne($empresa);
    }

    public function update(Request $request, Empresa $empresa)
    {
        $empresa->fill($request->all());
        $empresa->save();
        return $this->showOne($empresa);
    }

    public function destroy(Empresa $empresa)
    {
        $empresa->delete($empresa);
        return $this->showOne($empresa);
    }
}
