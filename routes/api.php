<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('test', function () {
    return 'Functioning';
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('upload', [ImageController::class, 'upload']);

    Route::get('user', [AuthController::class, 'user']);
    Route::get('permissions', [PermissionController::class, 'index']);

    Route::put('users/info', [AuthController::class, 'updateInfo']);
    Route::put('users/password', [AuthController::class, 'updatePassword']);
    
    Route::apiResource('users', UserController::class);
    Route::apiResource('roles', RoleController::class);
    Route::apiResource('products', ProductController::class);
    Route::apiResource('orders', OrderController::class)->only('index', 'show');
});
