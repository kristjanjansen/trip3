<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/forum/{id}", [ForumController::class, "show"])->name("forum.show");
Route::post("/comment", [CommentController::class, "store"])->name(
    "comment.store"
);

Route::get("/", [ForumController::class, "index"])->name("forum.index");
