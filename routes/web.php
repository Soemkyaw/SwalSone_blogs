<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;

// blog
Route::get("/", [BlogController::class, "index"]);
Route::get('/blog/create', [BlogController::class, 'create'])->middleware('auth');
Route::get("/blog/{blog:slug}", [BlogController::class, "show"]);
Route::post("/blog/store", [BlogController::class, "store"])->middleware('auth');
Route::get('/blog/{blog:slug}/edit', [BlogController::class, 'edit']);
Route::post('/blog/{blog:slug}/update', [BlogController::class, 'update'])->middleware('auth');
Route::delete('/blog/{blog:slug}/destroy', [BlogController::class, 'destroy'])->middleware('auth');
Route::post("/blog/{blog}/subscription", [BlogController::class, 'subscriptionHandler'])->middleware('auth');

// comment
Route::post('/blog/{blog}/comment', [CommentController::class, 'store'])->middleware('auth');

// user
Route::get('/user/{user:slug}/profile', [UserController::class, 'show'])->middleware('auth');
Route::get('/user/{user:slug}/edit', [UserController::class, 'edit'])->middleware('auth');
Route::post('/user/{user:slug}/update', [UserController::class, 'update'])->middleware('auth');
Route::get('/{user:slug}/blogs', [UserController::class, 'blogs'])->middleware('auth');

// auth
Route::get("/register", [AuthController::class, "register"])->middleware('guest');
Route::post("/register", [AuthController::class, "store"])->middleware('guest');
Route::get("/login", [AuthController::class, "login"])->middleware('guest');
Route::post("/login", [AuthController::class, "loginUser"])->middleware('guest');
Route::post("/logout", [AuthController::class, "logout"])->middleware('auth');

Route::middleware(['can:is_admin'])->prefix('admin')->group(function () {
    // admin dashboard
    Route::get("/dashboard", [AdminController::class, 'index']);
    Route::get('/blog/list', [AdminController::class, "blogList"]);
    Route::post('/blog/list/{blog}/status', [AdminController::class, "statusHandler"]);
    Route::get('/user/list', [AdminController::class, "userList"]);
    Route::post('/user/list/{user}/role', [AdminController::class, "roleHandler"]);
    Route::post('/{user}/delete', [AdminController::class, "userDestroy"]);
    Route::get("/profile", [AdminController::class, 'profile']);
    Route::get("/profile/{user:slug}/edit", [AdminController::class, 'profileEdit']);
    Route::post("/profile/{user:slug}/update", [AdminController::class, 'profileUpdate']);

    // category
    Route::get('/category/list', [CategoryController::class, 'index']);
    Route::get('/category/create', [CategoryController::class, 'create']);
    Route::post('/category/store', [CategoryController::class, 'store']);
    Route::get('/{category:slug}/edit', [CategoryController::class, 'edit']);
    Route::patch('/{category:slug}/update', [CategoryController::class, 'update']);
    Route::delete('/{category:slug}/destroy', [CategoryController::class, 'destroy']);
});






