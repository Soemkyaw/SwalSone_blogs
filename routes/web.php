<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;


// blog
Route::get("/",[BlogController::class,"index"]);
Route::get("/blog/{blog}",[BlogController::class,"show"]);

Route::post('/comment', [CommentController::class, 'store']);

// auth
Route::get("/register",[AuthController::class,"register"]);
Route::post("/register",[AuthController::class,"store"]);
Route::get("/login",[AuthController::class,"login"]);
Route::post("/login",[AuthController::class,"loginUser"]);
Route::post("/logout",[AuthController::class,"logout"]);
