<?php
use Illuminate\Support\Facades\Route;

Route::get('v1/brands',[\App\Http\Controllers\api\brand\brandController::class,'index']);
Route::post('v1/brands',[\App\Http\Controllers\api\brand\brandController::class,'store']);
Route::get('v1/brands/{brand}',[\App\Http\Controllers\api\brand\brandController::class,'show']);
Route::put('v1/brands/{brand}',[\App\Http\Controllers\api\brand\brandController::class,'update']);
Route::delete("v1/brands/{brand}",[\App\Http\Controllers\api\brand\brandController::class ,'destroy']);
