<?php

use App\Domains\WebDev\Controllers\ServerManagerController;
use Illuminate\Support\Facades\Route;

Route::prefix('webdev')->name('webdev.')->group(function () {
    Route::get('/dashboard', [ServerManagerController::class, 'index'])->name('dashboard');
    Route::get('/kanban', [ServerManagerController::class, 'kanban'])->name('kanban');
});
