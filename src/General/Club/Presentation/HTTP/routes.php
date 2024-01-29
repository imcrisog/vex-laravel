<?php

namespace Src\General\Club\Presentation\HTTP;

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'club'
], function() {

    // Main
    Route::resource('', ClubController::class);

    // Players
    Route::resource('players', ClubPlayersController::class);
});