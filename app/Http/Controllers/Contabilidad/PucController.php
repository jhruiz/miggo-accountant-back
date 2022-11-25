<?php

namespace App\Http\Controllers\Contabilidad;

use App\Models\Puc;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class PucController extends ApiController
{
    public function index()
    {
        $pucs = Puc::all();
        return $this->showall($pucs);
    }

    public function store(Request $request)
    {
        $puc = Puc::create($request->all());
        return $this->showOne($puc, 201);
    }

    public function show(Puc $puc)
    {
        return $this->showOne($puc);
    }

    public function update(Request $request, Puc $puc)
    {
        $puc->fill($request->all());
        $puc->save();
        return $this->showOne($puc);
        
    }

    public function destroy(Puc $puc)
    {
        $puc->delete($puc);
        return $this->showOne($puc);
    }
}
