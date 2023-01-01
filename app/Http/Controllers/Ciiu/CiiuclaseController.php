<?php

namespace App\Http\Controllers\Ciiu;

use App\Models\Ciiuclase;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class CiiuclaseController extends ApiController
{
    public function index()
    {
        $ciiuclases = Ciiuclase::all();
        return $this->showall($ciiuclases);
    }

    public function show(Ciiuclase $ciiuclase)
    {
        return $this->showOne($ciiuclase);
    }
}
