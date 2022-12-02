<?php

namespace App\Http\Controllers\Cloudmenu;

use App\Models\Cloudmenu;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;


class CloudmenuController extends ApiController
{

    public function index()
    {
        $cloudmenus = Cloudmenu::all();
        return $this->showAll($cloudmenus);
    }

}
