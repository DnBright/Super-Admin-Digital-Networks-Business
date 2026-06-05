<?php

use Illuminate\Support\Facades\Route;

Route::prefix('performanceads')->name('performanceads.')->group(function () {
    Route::get('/dashboard', function () {
        return view('index', ['tab' => 'performanceads_dashboard']);
    })->name('dashboard');
});
