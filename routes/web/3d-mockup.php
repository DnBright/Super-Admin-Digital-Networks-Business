<?php

use Illuminate\Support\Facades\Route;

Route::prefix('mockup3d')->name('mockup3d.')->group(function () {
    Route::get('/dashboard', function () {
        return view('index', ['tab' => 'mockup3d_dashboard']);
    })->name('dashboard');
});
