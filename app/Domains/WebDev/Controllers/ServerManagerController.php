<?php

namespace App\Domains\WebDev\Controllers;

use App\Http\Controllers\Controller;

class ServerManagerController extends Controller
{
    public function index()
    {
        return view('Divisions.webdev.dashboard');
    }

    public function kanban()
    {
        return view('Divisions.webdev.kanban-board');
    }
}
