<?php

namespace App\Http\Controllers;
use App\Content;

class ForumController extends Controller
{
    public function index()
    {
        $contents = Content::with(["user", "comments"])
            ->whereIn("type", ["forum", "buysell", "internal", "misc"])
            ->where("status", 1)
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
