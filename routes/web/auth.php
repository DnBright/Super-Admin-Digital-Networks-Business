<?php

use Illuminate\Support\Facades\Route;

Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('/login', function () {
        return response()->json(['message' => 'Login Page Stub']);
    })->name('login');

    Route::post('/login', function () {
        return response()->json(['message' => 'Login Action Stub']);
    })->name('login.post');

    Route::post('/logout', function () {
        return response()->json(['message' => 'Logout Action Stub']);
    })->name('logout');
});
