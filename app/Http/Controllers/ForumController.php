<?php

namespace App\Http\Controllers;
use App\Models\Content;

class ForumController extends Controller
{
    public function index()
    {
        $contents = Content::with(["user", "comments"])
            ->latest()
            ->simplePaginate(15)
            ->withQueryString();
        //return response()->json($contents);
        return inertia("ForumIndex", [
            "contents" => $contents,
        ])->withViewData([
            "title" => __("Forum"),
        ]);
    }

    public function show($index)
    {
        $content = Content::with([
            "user",
            "comments",
            "comments.user",
        ])->findOrFail($index);

        return inertia("ForumShow", [
            "content" => $content,
        ])->withViewData([
            "title" => $content->title,
        ]);
    }
}
