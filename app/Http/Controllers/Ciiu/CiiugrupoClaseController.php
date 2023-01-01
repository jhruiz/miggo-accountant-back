<?php

namespace App\Http\Controllers\Ciiu;

use App\Models\Ciiugrupo;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class CiiugrupoClaseController extends ApiController
{
    public function index(Ciiugrupo $ciiugrupo)
    {
        $ciiuclases = $ciiugrupo->ciiuclases()
        ->orderBy('id','ASC')
        ->get()
        ->unique()
        ->values();

        return $this->showAll($ciiuclases);

    }
}
