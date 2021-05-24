<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;
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

Route::get("/", [ForumController::class, "index"])->name("forum.index");
Route::get("/photo", [PhotoController::class, "index"])->name("photo.show");
Route::get("/forum/{id}", [ForumController::class, "show"])->name("forum.show");
Route::post("/comment/{id}", [CommentController::class, "store"])->name(
    "comment.store"
);
Route::put("/comment/{id}/{comment_id}", [
    CommentController::class,
    "update",
])->name("comment.update");
