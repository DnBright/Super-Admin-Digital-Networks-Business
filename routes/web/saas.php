<?php

use Illuminate\Support\Facades\Route;

Route::prefix('saas')->name('saas.')->group(function () {
    Route::get('/dashboard', function () {
        return view('index', ['tab' => 'saas_dashboard']);
    })->name('dashboard');
});
