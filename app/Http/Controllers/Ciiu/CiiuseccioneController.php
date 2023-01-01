<?php

namespace App\Http\Controllers\Ciiu;

use Illuminate\Http\Request;
use App\Models\Ciiuseccione;
use App\Http\Controllers\ApiController;

class CiiuseccioneController extends ApiController
{

    public function index()
    {
        $ciiusecciones = Ciiuseccione::all();
        return $this->showall($ciiusecciones);
    }

    public function show(Ciiuseccione $ciiuseccione)
    {
        return $this->showOne($ciiuseccione);
    }
}
