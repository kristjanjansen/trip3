<?php

namespace App\Http\Controllers;
use App\Models\Content;

class ForumController extends Controller
{
    public function index()
    {
        return inertia("ForumIndex", [
            "contents" => Content::with(["user", "comments"])->get(),
        ])->withViewData([
            "title" => __("Forum"),
        ]);
    }

    public function show($index)
    {
        $content = Content::with(["user", "comments"])->findOrFail($index);
        return inertia("ForumShow", [
            "content" => $content,
        ])->withViewData([
            "title" => $content->title,
        ]);
    }
}
