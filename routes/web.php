<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;

// blog
Route::get("/",[BlogController::class,"index"]);
Route::get("/blog/{blog}",[BlogController::class,"show"]);
Route::post("/blog/{blog}/subscription", [BlogController::class, 'subscriptionHandler']);

// comment
Route::post('/blog/{blog}/comment', [CommentController::class, 'store']);

// user
Route::get('/user/{user:slug}/profile',[UserController::class,'show']);
Route::get('/user/{user:slug}/edit',[UserController::class,'edit']);
Route::post('/user/{user:slug}/update',[UserController::class,'update']);

// auth
Route::get("/register",[AuthController::class,"register"]);
Route::post("/register",[AuthController::class,"store"]);
Route::get("/login",[AuthController::class,"login"]);
Route::post("/login",[AuthController::class,"loginUser"]);
Route::post("/logout",[AuthController::class,"logout"]);

// admin dashboard
Route::get("/admin/dashboard", [AdminController::class,'index']);
Route::get('/admin/blog/list', [AdminController::class, "blogList"]);
Route::post('/admin/blog/list/{blog}/status', [AdminController::class, "statusHandler"]);
Route::get('/admin/user/list', [AdminController::class, "userList"]);
Route::post('/admin/user/list/{user}/role', [AdminController::class, "roleHandler"]);
Route::post('/admin/{user}/delete', [AdminController::class, "userDestroy"]);
Route::get("/admin/profile", [AdminController::class, 'profile']);


