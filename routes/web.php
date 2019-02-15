<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use TalvBansal\MediaManager\Routes\MediaRoutes;

Route::group([
    'as' => 'admin',
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => ['auth'],
], function () {
    require_once(base_path('routes/web.admin.php'));
    MediaRoutes::get();
});

Route::group([
    'as' => 'app.',
    'namespace' => 'Front',
], function () {
    require_once(base_path('routes/web.app.php'));
});

Auth::routes();
