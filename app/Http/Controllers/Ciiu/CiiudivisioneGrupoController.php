<?php

namespace App\Http\Controllers\Ciiu;

use App\Models\Ciiudivisione;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class CiiudivisioneGrupoController extends ApiController
{
    public function index(Ciiudivisione $ciiudivisione)
    {
        $ciiugrupos = $ciiudivisione->ciiugrupos()
        ->orderBy('id','ASC')
        ->get()
        ->unique()
        ->values();

        return $this->showAll($ciiugrupos);

    }
}
