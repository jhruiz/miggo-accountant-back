<?php

namespace App\Http\Controllers\Ciiu;

use App\Models\Ciiuseccione;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class CiiuseccioneDivicioneController extends ApiController
{

    public function index(Ciiuseccione $ciiuseccione)
    {
        $ciiudivisiones = $ciiuseccione->ciiudivisiones()
        ->orderBy('id','ASC')
        ->get()
        ->unique()
        ->values();

        return $this->showAll($ciiudivisiones);

    }

}
