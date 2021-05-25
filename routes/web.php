<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\CommentController;

Route::get("/", [HomepageController::class, "index"])->name("homepage.index");
Route::get("/photo", [PhotoController::class, "index"])->name("photo.index");
Route::get("/forum/{id}", [ForumController::class, "show"])->name("forum.show");
Route::get("/forum", [ForumController::class, "index"])->name("forum.index");
Route::post("/comment/{id}", [CommentController::class, "store"])->name(
    "comment.store"
);
Route::put("/comment/{id}/{comment_id}", [
    CommentController::class,
    "update",
])->name("comment.update");
