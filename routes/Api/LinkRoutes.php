<?php

use App\Http\Controllers\LinkController;

Route::controller(LinkController::class)->name('link.')->group(function() {
    Route::post('/link', 'store')->name('store');
    Route::get('/{code}', 'show')->name('show');
});
