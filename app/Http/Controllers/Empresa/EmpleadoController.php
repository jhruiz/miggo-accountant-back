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

        // $empleados->each(function($empleados){
        //     $empleados->empresa;
        //     $empleados->user;// 1 a 1
        //     $empleados->persona;
        //   });

        return $this->showAll($empleados);
          
    }

    public function store(Request $request)
    {
        $empleado = Empleado::create($request->all());
        // $empleado->id_type = $request->id_type; CREO que lo hace directo Empleado 1 a 1

        return $this->showOne($empleado, 201);
    }

    public function show(Empleado $empleado)
    {
        // $empleado->persona;// 1 a 1
        // $empleado->user;// 1 a 1
        // $empleado->empresa;
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
