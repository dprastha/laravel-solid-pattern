<?php

use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\CommentController;
use App\Http\Controllers\Api\v1\PostController;
use App\Http\Controllers\Api\v1\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResources([
        'users' => UserController::class,
        'posts' => PostController::class,
        'comments' => CommentController::class
    ]);
});

Route::post('login', [AuthController::class, 'login']);
