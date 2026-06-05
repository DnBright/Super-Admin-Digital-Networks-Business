<?php

namespace App\Domains\BrandIdentity\Controllers;

use App\Http\Controllers\Controller;

class AssetVaultController extends Controller
{
    public function index()
    {
        return view('brandidentity.dashboard');
    }
}
