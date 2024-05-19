<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->group(function () {
    Route::prefix('/image')->group(function () {

        Route::post('/', [\App\Http\Controllers\api\image\ImageController::class, 'store']);
        //        Route::get('/', [\App\Http\Controllers\api\tag\TagController::class, 'index']);
        Route::put('/{image}', [\App\Http\Controllers\api\image\ImageController::class, 'update']);
    });
});
