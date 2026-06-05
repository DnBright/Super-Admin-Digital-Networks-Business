<?php

namespace App\Domains\SuperAdmin\Controllers;

use App\Http\Controllers\Controller;

class ClientMasterController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'List of clients across all divisions']);
    }
}
