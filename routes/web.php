<?php

use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function () {
    Route::get('/properties', [SearchController::class, 'index']);
    Route::get('/search', [SearchController::class, 'searchProperties']);
});
