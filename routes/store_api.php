<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->group(function () {
    Route::prefix('/kala')->group(function () {
        Route::post('/', [\App\Http\Controllers\api\store\KalaController::class, 'store']);
        Route::get('/', [\App\Http\Controllers\api\store\KalaController::class, 'index']);
        Route::get('/getpropperti/{id}', [\App\Http\Controllers\api\store\GetProppertiKalaController::class, 'getproppertikala']);
        Route::prefix('/proppertis')->group(function () {
            Route::post('/', [\App\Http\Controllers\api\store\KalaProppertiController::class, 'store']);
            Route::get('/', [\App\Http\Controllers\api\store\KalaProppertiController::class, 'index']);
            Route::put('/', [\App\Http\Controllers\api\store\KalaProppertiController::class, 'update']);
        });

        Route::prefix('/sort')->group(function () {
            Route::prefix('/visit')->group(function () {

                Route::get('/all', [\App\Http\Controllers\api\store\sort\visit\MostvisitingController::class, 'mostvisitAll']);
                Route::get('/{cat}/{bra}', [\App\Http\Controllers\api\store\sort\visit\MostvisitingController::class, 'mostvisitWhereAll']);
                Route::get('/{cat}', [\App\Http\Controllers\api\store\sort\visit\MostvisitingController::class, 'mostvisitWhereCategorie']);
                Route::get('//{bra}', [\App\Http\Controllers\api\store\sort\visit\MostvisitingController::class, 'mostvisitWhereBrand']);
            });
            Route::prefix('/cheapest')->group(function () {

                Route::get('/all', \App\Http\Controllers\api\store\sort\cheapest\AllController::class);
                Route::get('/{categorie}', \App\Http\Controllers\api\store\sort\cheapest\whereController::class);
            });
            Route::prefix('/costly')->group(function () {

                Route::get('/all', \App\Http\Controllers\api\store\sort\costly\AllController::class);
                Route::get('/{categorie}', \App\Http\Controllers\api\store\sort\costly\whereController::class);
            });
        });


    });

});
