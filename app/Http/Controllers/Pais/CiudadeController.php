<?php

namespace App\Http\Controllers\Pais;

use App\Models\Ciudade;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class CiudadeController extends ApiController
{
    public function show(Ciudade $ciudade)
    {
        return $this->showOne($ciudade);
    }
}
