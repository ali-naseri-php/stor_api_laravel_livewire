<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->group(function () {
    Route::prefix('/tag')->group(function () {

        Route::post('/', [\App\Http\Controllers\api\tag\TagController::class, 'store']);
        Route::get('/', [\App\Http\Controllers\api\tag\TagController::class, 'index']);
        Route::put('/{tag}', [\App\Http\Controllers\api\tag\TagController::class,'update']);
    });
    });
