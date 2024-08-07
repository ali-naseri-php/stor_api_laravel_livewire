<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->group(function () {
    Route::prefix('/images')->group(function () {

        Route::post('/', \App\Http\Controllers\api\image\storeImageController::class);
        Route::get('/', \App\Http\Controllers\api\image\allImageController::class);
        Route::put('/{image}', \App\Http\Controllers\api\image\updateImageController::class);
    });
});
