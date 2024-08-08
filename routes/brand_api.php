<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->group(function () {
    Route::prefix('/brand')->group(function () {
        Route::get('/{brand}',\App\Http\Controllers\api\brand\showBrandController::class);
        Route::post('/', \App\Http\Controllers\api\brand\showBrandController::class);
        Route::get('/', \App\Http\Controllers\api\brand\allBrandController::class);
        Route::put('/{image}', \App\Http\Controllers\api\brand\updateBrandController::class);
    });
});
