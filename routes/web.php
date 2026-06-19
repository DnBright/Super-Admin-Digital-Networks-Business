<?php

use Illuminate\Support\Facades\Route;

// Root landing page redirects to /global-command
Route::get('/', function () {
    return redirect('/global-command');
});

// Master Control Pages
Route::get('/global-command', function () {
    return view('index', ['tab' => 'global_command']);
});

Route::get('/access-control', function () {
    return view('index', ['tab' => 'access_control']);
});

use App\Domains\SuperAdmin\Controllers\BillingController;
use App\Domains\SuperAdmin\Controllers\SystemSettingsController;

Route::get('/system-settings', function () {
    return view('index', ['tab' => 'system_settings']);
});

Route::get('/api/system-settings', [SystemSettingsController::class, 'fetchSettings']);
Route::post('/api/system-settings/division/{id}', [SystemSettingsController::class, 'saveDivision']);
Route::post('/api/system-settings/test-db/{id}', [SystemSettingsController::class, 'testDbConnection']);
Route::post('/api/system-settings/global', [SystemSettingsController::class, 'saveGlobalSettings']);

Route::get('/revenue-report', function () {
    return view('index', ['tab' => 'revenue_report']);
});

// Dynamic Billing & Invoice Routes
Route::get('/billing-invoice', [BillingController::class, 'index'])->name('billing.index');
Route::post('/api/billing-invoice', [BillingController::class, 'store'])->name('api.billing.store');
Route::get('/api/billing-invoice/validate', [BillingController::class, 'validateChain'])->name('api.billing.validate');
Route::get('/billing-invoice/{id}/pdf', [BillingController::class, 'downloadPdf'])->name('billing.pdf');

Route::get('/client-directory', function () {
    return view('index', ['tab' => 'client_directory']);
});

// Load sub-route files from the web/ directory
Route::middleware('web')->group(function () {
    require __DIR__.'/web/auth.php';
    require __DIR__.'/web/superadmin.php';
    require __DIR__.'/web/webdev.php';
    require __DIR__.'/web/brand-id.php';
    require __DIR__.'/web/ads-marketing.php';
    require __DIR__.'/web/3d-mockup.php';
    require __DIR__.'/web/saas.php';
    require __DIR__.'/web/design3d-arsitek.php';
});
