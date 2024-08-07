<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->group(function () {
    Route::prefix('/categories')->group(function () {

        Route::post('/', \App\Http\Controllers\api\categorie\storeCategorieController::class);
        Route::get('/', \App\Http\Controllers\api\categorie\allCategorieController::class);
        Route::put('/{categorie}', \App\Http\Controllers\api\categorie\updateCategorieController::class);
    });
    Route::prefix('/proppertis')->group(function () {

        Route::post('/', \App\Http\Controllers\api\categorie\storeProppertiController::class);
        Route::get('/', \App\Http\Controllers\api\categorie\allProppertiController::class);
        Route::put('/{propperti}', \App\Http\Controllers\api\categorie\updateProppertiController::class);
    });

    Route::get('/getProppertiCategorie/{categorie}',\App\Http\Controllers\api\categorie\GetProppertiCategorieController::class);
});
