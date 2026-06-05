<?php

use Illuminate\Support\Facades\Route;

// Root landing page
Route::get('/', function () {
    return view('index');
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
