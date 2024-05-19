<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->group(function () {

    Route::post('/login', [\App\Http\Controllers\api\auth\LoginController::class,'login']);
    Route::post('/register', [\App\Http\Controllers\api\auth\RegisterController::class,'register']);


});
