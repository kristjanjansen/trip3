<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontpageController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\CommentController;

Route::get("/", [FrontpageController::class, "index"])->name("frontpage.index");
Route::get("/photo", [PhotoController::class, "index"])->name("photo.index");
Route::get("/forum/general", [ForumController::class, "indexGeneral"])->name(
    "forum.index.general"
);
Route::get("/forum/buysell", [ForumController::class, "indexBuysell"])->name(
    "forum.index.buysell"
);
Route::get("/forum/expat", [ForumController::class, "indexExpat"])->name(
    "forum.index.expat"
);
Route::get("/forum/misc", [ForumController::class, "indexMisc"])->name(
    "forum.index.misc"
);
Route::get("/forum/{id}", [ForumController::class, "show"])->name("forum.show");
Route::post("/comment/{id}", [CommentController::class, "store"])->name(
    "comment.store"
);
Route::put("/comment/{id}/{comment_id}", [
    CommentController::class,
    "update",
])->name("comment.update");
