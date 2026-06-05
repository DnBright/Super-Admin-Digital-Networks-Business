<?php

use App\Domains\VideoProduction\Controllers\StorageMonitorController;
use Illuminate\Support\Facades\Route;

Route::prefix('videoproduction')->name('videoproduction.')->group(function () {
    Route::get('/dashboard', [StorageMonitorController::class, 'index'])->name('dashboard');
});
