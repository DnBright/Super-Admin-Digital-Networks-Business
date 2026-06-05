<?php

use Illuminate\Support\Facades\Route;

Route::prefix('mockup3d')->name('mockup3d.')->group(function () {
    Route::get('/dashboard', function () {
        return view('Divisions.mockup3d.dashboard');
    })->name('dashboard');
});
