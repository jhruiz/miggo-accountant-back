<?php

namespace App\Http\Controllers\User;

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

    public function store(Request $request)
    {
        $perfile = Perfile::create($request->all());
        return $this->showOne($perfile, 201);
    }

    public function show(Perfile $perfile)
    {
        return $this->showOne($perfile);
    }

    public function update(Request $request, Perfile $perfile)
    {
        $perfile->fill($request->all());
        $perfile->save();
        return $this->showOne($perfile);
    }

    public function destroy(Perfile $perfile)
    {
        $perfile->delete($perfile);
        return $this->showOne($perfile);
    }
}
