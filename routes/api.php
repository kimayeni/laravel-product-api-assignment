<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\AuthController;

Route::post('/login-test', function () {
    return response()->json(['ok' => true]);
});

Route::get('/test', function () {
    return response()->json([
        'message' => 'API is working!'
    ]);
});

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')
    ->apiResource('products', ProductApiController::class);