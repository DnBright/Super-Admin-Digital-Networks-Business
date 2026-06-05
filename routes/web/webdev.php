<?php

use App\Domains\WebDev\Controllers\ServerManagerController;
use App\Domains\WebDev\Controllers\WebDevManageController;
use Illuminate\Support\Facades\Route;

Route::prefix('webdev')->name('webdev.')->group(function () {
    Route::get('/dashboard', [ServerManagerController::class, 'index'])->name('dashboard');
    Route::get('/kanban', [ServerManagerController::class, 'kanban'])->name('kanban');

    // Cross-Database Templates Control
    Route::get('/templates', [WebDevManageController::class, 'templatesIndex'])->name('templates.index');
    Route::post('/templates', [WebDevManageController::class, 'templatesStore'])->name('templates.store');
    Route::put('/templates/{id}', [WebDevManageController::class, 'templatesUpdate'])->name('templates.update');
    Route::delete('/templates/{id}', [WebDevManageController::class, 'templatesDestroy'])->name('templates.destroy');

    // Cross-Database Pricing Packages Control
    Route::get('/packages', [WebDevManageController::class, 'packagesIndex'])->name('packages.index');
    Route::put('/packages/{id}', [WebDevManageController::class, 'packagesUpdate'])->name('packages.update');

    // Cross-Database Reviews Control
    Route::get('/reviews', [WebDevManageController::class, 'reviewsIndex'])->name('reviews.index');
    Route::post('/reviews/{id}/toggle', [WebDevManageController::class, 'reviewsToggle'])->name('reviews.toggle');
    Route::delete('/reviews/{id}', [WebDevManageController::class, 'reviewsDestroy'])->name('reviews.destroy');

    // Cross-Database Live Chat Control
    Route::get('/chat', [WebDevManageController::class, 'chatIndex'])->name('chat.index');
    Route::post('/chat/send', [WebDevManageController::class, 'chatSend'])->name('chat.send');
    Route::delete('/chat/session/{id}', [WebDevManageController::class, 'chatDestroy'])->name('chat.destroy');
});
