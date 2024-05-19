<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->group(function () {
    Route::prefix('/categorie')->group(function () {

        Route::post('/', [\App\Http\Controllers\api\categorie\CategorieController::class, 'store']);
        Route::get('/', [\App\Http\Controllers\api\categorie\CategorieController::class, 'index']);
        Route::put('/{categorie}', [\App\Http\Controllers\api\categorie\CategorieController::class, 'update']);
    });
    Route::prefix('/proppertis')->group(function () {

        Route::post('/', [\App\Http\Controllers\api\categorie\ProppertiController::class, 'store']);
        Route::get('/', [\App\Http\Controllers\api\categorie\ProppertiController::class, 'index']);
        Route::put('/', [\App\Http\Controllers\api\categorie\ProppertiController::class, 'update']);
    });

    Route::get('/getProppertiCategorie/{categorie}',\App\Http\Controllers\api\categorie\GetProppertiCategorieController::class);
});
