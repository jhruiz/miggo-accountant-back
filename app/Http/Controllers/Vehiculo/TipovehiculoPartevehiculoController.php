<?php

namespace App\Http\Controllers\Vehiculo;

use App\Models\Tipovehiculo;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class TipovehiculoPartevehiculoController extends ApiController
{

    public function index(Tipovehiculo $tipovehiculo)
    {
        $partevehiculos = $tipovehiculo->partevehiculos()
        ->orderBy('id','DESC')
        ->get()
        ->unique()
        ->values();

        return $this->showAll($partevehiculos);
    }

    public function alltipovehiculopartes()
    {
        $tipovehiculos = Tipovehiculo::orderBy('id','DESC')->get();

        $count = [];

        foreach ($tipovehiculos as $tipovehiculo) {
            $count[] = $tipovehiculo->partevehiculos->count();
        }

        $data = ['data'=> $tipovehiculos, 'count'=> $count];

        return response()->json($data);

        // return $this->showAll(collect($data));
    }

    public function update(Request $request, Tipovehiculo $tipovehiculo)
    {
        $tipovehiculo->partevehiculos()->attach($request->partevehiculo_id);
       
        $tipovehiculo->save();

        return $this->showOne($tipovehiculo);
    }

    public function destroy(Request $request, Tipovehiculo $tipovehiculo)
    {
        if(!$tipovehiculo->partevehiculos()->find($request->partevehiculo_id))
        {
            return $this->errorResponse("La Parte del Vehiculo especificada no esta asociada a ese tipo",404);
        }

        $tipovehiculo->partevehiculos()->detach($request->partevehiculo_id);

        $tipovehiculo->save();

        return $this->showOne($tipovehiculo);
    }
}
