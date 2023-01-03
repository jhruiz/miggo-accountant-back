<?php

namespace App\Http\Controllers\Puc;

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

    public function store(Request $request)//TODO: cuenta puc padre, el id de la empresa y id usuario creador
    {
        if($request->has('user_id') && $request->has('empresa_id') && $request->has('puc_id')){
            $puc = Puc::create($request->all());
            return $this->showOne($puc, 201);
        }
    }

    public function show(Puc $puc)
    {
        return $this->showOne($puc);
    }

    public function update(Request $request, Puc $puc)
    {
        if($puc->empresa_id == $request->empresa_id){
            $puc->fill($request->all());
            $puc->save();
            return $this->showOne($puc);
         }else{
            return response()->json(['error' => 'solo puede editar la cuenta puc creada por su empresa',
            'code' => 422], 422);
         }
    }

    public function destroy(Request $request, Puc $puc)
    {
        if($puc->empresa_id == $request->empresa_id){

                $puc->delete($puc);
                return $this->showOne($puc);
        }else{
            return response()->json(['error' => 'solo puede eliminar la cuenta puc creada por su empresa',
            'code' => 422], 422);
            }   
    }

    public function allpucs(Puc $puc)
    {
        $pucs = $puc->pucs()
        ->with('pucs')
        ->orderBy('id','DESC')
        ->get()
        // ->pluck('employee')
        ->unique()
        ->values();

        // $pucs->each(function($pucs){
        //    $pucs->pucs;
        //  });

        return $this->showAll($pucs);
    }    
}
