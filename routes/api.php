<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\DreamController;
use App\Http\Controllers\Api\V1\MarketplaceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| REST API v1 Routes — ImpiDream Backend Architecture
|--------------------------------------------------------------------------
*/

Route::prefix('v1')->group(function () {

    // Public Auth Endpoints
    Route::prefix('auth')->group(function () {
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/login', [AuthController::class, 'login']);
    });

    // Public Marketplace Product Reference Endpoints
    Route::prefix('marketplace')->group(function () {
        Route::get('/products', [MarketplaceController::class, 'index']);
        Route::get('/products/{id}', [MarketplaceController::class, 'show']);
    });

    // Authenticated Sanctum Routes
    Route::middleware('auth:sanctum')->group(function () {
        
        // Auth Management
        Route::get('/auth/me', [AuthController::class, 'me']);
        Route::post('/auth/logout', [AuthController::class, 'logout']);

        // Dream Management CRUD & Precision Calculator Engine
        Route::apiResource('dreams', DreamController::class);
        Route::post('/dreams/{id}/progress', [DreamController::class, 'recordProgress']);
    });

});
