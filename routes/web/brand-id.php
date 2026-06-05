<?php

use App\Domains\BrandIdentity\Controllers\AssetVaultController;
use Illuminate\Support\Facades\Route;

Route::prefix('brandidentity')->name('brandidentity.')->group(function () {
    Route::get('/dashboard', [AssetVaultController::class, 'index'])->name('dashboard');
    Route::get('/assets', [AssetVaultController::class, 'assets'])->name('assets');
    Route::get('/tokens', [AssetVaultController::class, 'tokens'])->name('tokens');
});
