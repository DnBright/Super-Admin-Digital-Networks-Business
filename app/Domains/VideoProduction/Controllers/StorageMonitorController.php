<?php

namespace App\Domains\VideoProduction\Controllers;

use App\Http\Controllers\Controller;

class StorageMonitorController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'VideoProduction Storage Monitor Panel']);
    }
}
