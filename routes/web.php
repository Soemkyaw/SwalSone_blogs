<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;


// blog
Route::get("/",[BlogController::class,"index"]);
Route::get("/blog/{blog}",[BlogController::class,"show"]);

// auth
Route::get("/register",[AuthController::class,"register"]);
Route::post("/register",[AuthController::class,"store"]);
Route::get("/login",[AuthController::class,"login"]);
Route::post("/login",[AuthController::class,"loginUser"]);
Route::post("/logout",[AuthController::class,"logout"]);
