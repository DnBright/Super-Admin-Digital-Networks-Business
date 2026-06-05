<?php

use Illuminate\Support\Facades\Route;

Route::prefix('performanceads')->name('performanceads.')->group(function () {
    Route::get('/dashboard', function () {
        return view('Divisions.performanceads.dashboard');
    })->name('dashboard');
});
