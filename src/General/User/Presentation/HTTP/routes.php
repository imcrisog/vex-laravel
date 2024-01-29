<?php

namespace Src\General\User\Presentation\HTTP;

use Illuminate\Support\Facades\Route;

use Src\General\User\Presentation\HTTP\UserController;

Route::group([
    'prefix' => 'user'
], function() {

    Route::get('{id}', [UserController::class, 'show']);
});