<?php

Route::get('/timeline', [App\Http\Controllers\Api\Timeline\TimelineController::class, 'index'])->name('timeline');

Route::post('/sneaks', [App\Http\Controllers\Api\Sneaks\SneakController::class, 'store'])->name('sneaks');