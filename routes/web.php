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

Route::get('/system-settings', function () {
    return view('index', ['tab' => 'system_settings']);
});

// Load sub-route files from the web/ directory
Route::middleware('web')->group(function () {
    require __DIR__ . '/web/auth.php';
    require __DIR__ . '/web/superadmin.php';
    require __DIR__ . '/web/webdev.php';
    require __DIR__ . '/web/brand-id.php';
    require __DIR__ . '/web/ads-marketing.php';
    require __DIR__ . '/web/3d-mockup.php';
    require __DIR__ . '/web/social-media.php';
    require __DIR__ . '/web/video-production.php';
});
