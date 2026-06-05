<?php

namespace App\Domains\SuperAdmin\Controllers;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Placeholder return or view
        return response()->json(['message' => 'Welcome to Super Admin Dashboard']);
    }
}
