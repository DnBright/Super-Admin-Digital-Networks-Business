<?php

namespace App\Domains\WebDev\Controllers;

use App\Http\Controllers\Controller;

class ServerManagerController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'WebDev Server Manager Console']);
    }
}
