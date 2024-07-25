<?php
use Illuminate\Support\Facades\Route;

Route::get('v1/brands',[\App\Http\Controllers\api\brand\brandController::class,'index']);
Route::post('v1/brands',[\App\Http\Controllers\api\brand\brandController::class,'store']);
