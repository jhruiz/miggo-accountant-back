<?php

namespace App\Http\Controllers\Ciiu;

use App\Models\Ciiudivisione;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class CiiudivisioneController extends ApiController
{
    public function index()
    {
        $ciiudivisiones = Ciiudivisione::all();
        return $this->showall($ciiudivisiones);
    }

    public function show(Ciiudivisione $ciiudivisione)
    {
        return $this->showOne($ciiudivisione);
    }
}
