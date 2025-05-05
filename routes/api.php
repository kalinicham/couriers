<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CourierController;
use Illuminate\Support\Facades\Route;

Route::post('token', [AuthController::class, 'token']);

Route::middleware('auth:sanctum')->prefix('courier')->group(function () {
    Route::get('list', [CourierController::class, 'list']);
    Route::post('{id}/updatePosition', [CourierController::class, 'updatePosition']);
});
