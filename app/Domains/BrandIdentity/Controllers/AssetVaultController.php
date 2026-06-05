<?php

namespace App\Domains\BrandIdentity\Controllers;

use App\Http\Controllers\Controller;

class AssetVaultController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'BrandIdentity Asset Vault']);
    }
}
