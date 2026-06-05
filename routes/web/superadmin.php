<?php

use App\Domains\SuperAdmin\Controllers\ClientMasterController;
use App\Domains\SuperAdmin\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('superadmin')->name('superadmin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/clients', [ClientMasterController::class, 'index'])->name('clients.index');
    Route::get('/clients/{client}', function ($client) {
        return view('superadmin.clients.detail-matrix', compact('client'));
    })->name('clients.detail');
});
