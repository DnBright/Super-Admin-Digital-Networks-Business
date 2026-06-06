<?php

use App\Domains\Design3DArsitek\Controllers\StorageMonitorController;
use Illuminate\Support\Facades\Route;

Route::prefix('design3darsitek')->name('design3darsitek.')->group(function () {
    Route::get('/dashboard', [StorageMonitorController::class, 'index'])->name('dashboard');
});
