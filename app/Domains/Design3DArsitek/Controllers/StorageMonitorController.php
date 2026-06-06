<?php

namespace App\Domains\Design3DArsitek\Controllers;

use App\Http\Controllers\Controller;

class StorageMonitorController extends Controller
{
    public function index()
    {
        return view('index', ['tab' => 'design3darsitek_dashboard']);
    }
}
