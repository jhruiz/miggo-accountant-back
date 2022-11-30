<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

// use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;

trait ApiResponser
{
    private function successResponse($data, $codigo)
    {
        return response()->json($data, $codigo);
    }

    protected function errorResponse($mesaje, $codigo){
       // return response()->json(['error'=>$mesaje, 'code'=> $codigo], $codigo);
        return response()->json( ['error'=>['status'=> 'error','message'=> $mesaje, 'code'=> $codigo]], $codigo);

    }
    
    protected function showAll(Collection $collection, $codigo = 200){
        $collection = $this->filterData($collection);
        $collection = $this->sortData($collection);
     //   $collection = $this->paginate($collection);
        return $this->successResponse(['data' =>  $collection], $codigo);
    }

    protected function showOne(Model $instance, $codigo = 200){
        return $this->successResponse(['data' => $instance], $codigo);
    }  

    protected function showMessage($mesaje, $codigo = 200){
        return $this->successResponse(['data' => $mesaje], $codigo);
    }

    protected function filterData(Collection $collection){

        foreach(request()->query() as $query => $value){
            $attribute = $query;
            if (isset($attribute,$value) && $attribute != 'sort_by') {
                $collection = $collection->where($attribute, $value);
            }
        }
        return $collection;
    }

    protected function sortData(Collection $collection){

        if(request()->has('sort_by')){
            $attribute = request()->sort_by;
            $collection = $collection->sortBy->$attribute;
        }
        return $collection;
    }

    
    protected function paginate(Collection $collection){

        $rules = [
            'per_page' => 'integer|min:2|max:50'
        ];

        Validator::validate(request()->all(), $rules);

        $current_page = LengthAwarePaginator::resolveCurrentPage();

        $pageName = 'page';
        $perPage = 15;
        $total = $collection->count();

        if (request()->has('per_page')) {
            $perPage = (int) request()->per_page;
        }

     // $offset = ($page - 1) * $perPage;
      $offset = ($current_page * $perPage) - $perPage;
//      $results = array_slice($collection->toArray(), $offset, $perPage, true);
      $results = $collection->slice($offset, $perPage);
     // $request = request();


      $paginated = new LengthAwarePaginator($results, $total, $perPage, $current_page, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
          //  'path' => $request->url(),
          //  'query' => $request->query(),
        ]);

        $paginated->appends(request()->all());
        return $paginated;
    }
}