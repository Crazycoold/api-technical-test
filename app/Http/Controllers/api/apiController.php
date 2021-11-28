<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Traits\DataManagement;
use App\Http\Controllers\api\requestController;

class apiController extends requestController
{
    use DataManagement;

    public function __construct()
    {
        parent::__construct();
        //$this->middleware('client.credentials');
    }
}
