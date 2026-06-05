<?php

use Illuminate\Support\Facades\Route;

Route::prefix('socialmedia')->name('socialmedia.')->group(function () {
    Route::get('/dashboard', function () {
        return view('Divisions.socialmedia.dashboard');
    })->name('dashboard');
});
