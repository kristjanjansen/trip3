<?php

namespace App\Http\Controllers;

class ForumController extends Controller
{
    public function index()
    {
        return inertia("ForumIndex", [
            "contents" => config("data.forums"),
        ])->withViewData([
            "title" => __("Forum"),
        ]);
    }

    public function show($index)
    {
        $content = config("data.forums")[$index - 1];
        return inertia("ForumShow", [
            "content" => $content,
        ])->withViewData([
            "title" => $content["title"],
        ]);
    }
}
