<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get("/",[BlogController::class,"index"]);
Route::get("/blog/{blog}",[BlogController::class,"show"]);
