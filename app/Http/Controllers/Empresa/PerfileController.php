<?php

namespace App\Http\Controllers\Empresa;

use App\Models\Perfile;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class PerfileController extends ApiController
{
    public function index()
    {
        $perfiles = Perfile::all();
        return $this->showall($perfiles);
    }

    public function show(Perfile $perfile)
    {
        $perfile->empresa;
        return $this->showOne($perfile);
    }

    public function update(Request $request, Perfile $perfile)
    {
        $perfile->fill($request->all());
        $perfile->empresa;
        return $this->showOne($perfile);
    }
    
    public function destroy(Perfile $perfile)
    {
        $perfile->delete($perfile);
        return $this->showOne($perfile);
    }
}
