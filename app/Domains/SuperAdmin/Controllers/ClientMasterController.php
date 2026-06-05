<?php

namespace App\Domains\SuperAdmin\Controllers;

use App\Http\Controllers\Controller;

class ClientMasterController extends Controller
{
    public function index()
    {
        return view('superadmin.clients.index');
    }
}
