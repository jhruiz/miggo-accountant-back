<?php

namespace App\Http\Controllers\Empresa;

use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;


class EmpleadoController extends ApiController
{
   
    public function index()
    {
     
        $empleados = Empleado::all();

        $empleados->each(function($empleados){
        //     $empleados->empresa;
             $empleados->user;// 1 a 1
            $empleados->persona;
          });

        return $this->showAll($empleados);
          
    }

    public function store(Request $request)
    {
        $empleado = Empleado::create($request->all());
        return $this->showOne($empleado, 201);
    }

    public function show(Empleado $empleado)
    {
        $empleado->persona;
        $empleado->user;
        return $this->showOne($empleado);
    }

    public function update(Request $request, Empleado $empleado)
    {
        $empleado->fill($request->all())->save();
        return $this->showOne($empleado);
    }

    public function destroy(Empleado $empleado)
    {
        $empleado->delete($empleado);
        return $this->showOne($empleado);
    }

}
