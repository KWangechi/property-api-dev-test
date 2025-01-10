<?php

use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function () {
    Route::get('/search', [SearchController::class, 'searchProperties']);
});
