<?php

use App\Http\Controllers\LinkController;

Route::controller(LinkController::class)->group(function() {
    Route::post('/link', 'store');
    Route::get('/{code}', 'show');
});
