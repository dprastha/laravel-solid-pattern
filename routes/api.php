<?php

use App\Http\Controllers\Api\v1\PostController;
use App\Http\Controllers\Api\v1\UserController;
use Illuminate\Support\Facades\Route;

Route::apiResources([
    'users' => UserController::class,
    'posts' => PostController::class
]);

// Route::get('users', [UserController::class, 'index']);
// Route::post('users', [UserController::class, 'store']);
// Route::get('users/{user}', [UserController::class, 'show']);
// Route::put('users/{user}', [UserController::class, 'update']);
// Route::delete('users/{user}', [UserController::class, 'destroy']);
