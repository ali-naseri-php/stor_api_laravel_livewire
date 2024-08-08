<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

require __DIR__.'/auth_api.php';
require __DIR__.'/tag_api.php';
require __DIR__.'/image_api.php';
require __DIR__.'/brand_api.php';

require __DIR__.'/store_api.php';
require __DIR__.'/categorie_api.php';

