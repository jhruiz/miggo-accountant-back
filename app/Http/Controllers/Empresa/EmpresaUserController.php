<?php

namespace App\Http\Controllers\Empresa;

use App\Models\Empresa;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;


class EmpresaUserController extends ApiController
{
    public function index(Empresa $empresa)//TODO: crear seed para probar nuevos controladores  
    {
        $users = $empresa->users()
        ->orderBy('id','DESC')
        ->get()
        ->unique()
        ->values();

        return $this->showAll($users);

    }
}
