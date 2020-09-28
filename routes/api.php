<?php

Route::get('/timeline', [App\Http\Controllers\Api\Timeline\TimelineController::class, 'index'])->name('timeline');

Route::post('/sneaks', [App\Http\Controllers\Api\Sneaks\SneakController::class, 'store'])->name('sneaks');

Route::post('/sneaks/{sneak}/likes', [App\Http\Controllers\Api\Sneaks\SneakLikeController::class, 'store'])->name('sneaks');

Route::delete('/sneaks/{sneak}/likes', [App\Http\Controllers\Api\Sneaks\SneakLikeController::class, 'destroy'])->name('sneaks');