<?php

namespace App\Traits;

use Illuminate\Contracts\Pagination\LengthAwarePaginator as PaginationLengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

// use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;


use Illuminate\Container\Container;
use Illuminate\Pagination\Paginator;

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
        $collection = $this->paginate2($collection);
        return $this->successResponse($collection, $codigo);
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

    
    protected function paginate2(Collection $collection, $total = null, $page = null, $pageName = 'page'){

        $rules = [
            'per_page' => 'integer|min:2|max:50'
        ];

        Validator::validate(request()->all(), $rules);

        $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);
        $perPage = 15;


        if (request()->has('per_page')) {
                $perPage = (int) request()->per_page;
            }

            $currentPath    = LengthAwarePaginator::resolveCurrentPath();

            // if (strpos($currentPath,'/page/') !== false){
            //     list($currentPath,)    = explode('/page/',$currentPath);
            // }

            $paginated = new LengthAwarePaginator(
                $collection->forPage($page, $perPage)->values(),
                $total ?: $collection->count(),
                $perPage,
                $page,
                [
                    'path' => $currentPath, /*LengthAwarePaginator::resolveCurrentPath(),*/
                    'pageName' => $pageName,
                ]
            );

            $paginated->appends(request()->all());

        return $paginated;


//***************************************************************** */

// $rules = [
//     'per_page' => 'integer|min:2|max:50'
// ];

// Validator::validate(request()->all(), $rules);

// $page = LengthAwarePaginator::resolveCurrentPage();
// $perPage = 15;

// if (request()->has('per_page')) {
//         $perPage = (int) request()->per_page;
//     }

// $results = $collection->slice(($page - 1) * $perPage, $perPage)->values();

// $paginated = new LengthAwarePaginator($results, $collection->count(), $perPage, $page,[
//     'path' => LengthAwarePaginator::resolveCurrentPath(),
// ]);



// $paginated->appends(request()->all());

// return $paginated;

    }



    public static function paginate(Collection $results, $pageSize = 15)
    {
        $page = Paginator::resolveCurrentPage('page');
        
        $total = $results->count();

        return self::paginator($results->forPage($page, $pageSize), $total, $pageSize, $page, [
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => 'page',
        ]);

    }


    protected static function paginator($items, $total, $perPage, $currentPage, $options)
    {
        return Container::getInstance()->makeWith(LengthAwarePaginator::class, compact(
            'items', 'total', 'perPage', 'currentPage', 'options'
        ));
    }
    
}