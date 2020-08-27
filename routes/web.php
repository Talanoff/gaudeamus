<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

require_once(base_path('routes/web.admin.php'));

Route::group([
    'as' => 'app.',
    'namespace' => 'Front',
], function () {
    require_once(base_path('routes/web.app.php'));
});

Auth::routes();
