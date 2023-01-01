<?php

namespace App\Http\Controllers\Ciiu;

use App\Models\Ciiugrupo;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class CiiugrupoController extends ApiController
{
    public function index()
    {
        $ciiugrupos = Ciiugrupo::all();
        return $this->showall($ciiugrupos);
    }

    public function show(Ciiugrupo $ciiugrupo)
    {
        return $this->showOne($ciiugrupo);
    }
}
