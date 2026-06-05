<?php

namespace App\Domains\VideoProduction\Controllers;

use App\Http\Controllers\Controller;

class StorageMonitorController extends Controller
{
    public function index()
    {
        return view('videoproduction.dashboard');
    }
}
