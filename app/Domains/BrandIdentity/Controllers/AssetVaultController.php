<?php

namespace App\Domains\BrandIdentity\Controllers;

use App\Http\Controllers\Controller;

class AssetVaultController extends Controller
{
    public function index()
    {
        return view('index', ['tab' => 'brandidentity_dashboard']);
    }

    public function assets()
    {
        return view('index', ['tab' => 'brandidentity_assets']);
    }

    public function tokens()
    {
        return view('index', ['tab' => 'brandidentity_tokens']);
    }
}
