<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

trait ApiResponser
{
    private function successResponse($data, $codigo)
    {
        return response()->json($data, $codigo);
    }

    protected function errorResponse($mesaje, $codigo){
        return response()->json(['error'=>$mesaje, 'code'=> $codigo], $codigo);
    }
    
    protected function showAll(Collection $collection, $codigo = 200){
        return $this->successResponse(['data' =>  $collection], $codigo);
    }

    protected function showOne(Model $instance, $codigo = 200){
        return $this->successResponse(['data' => $instance], $codigo);
    }

}