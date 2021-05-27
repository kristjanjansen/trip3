<?php

namespace App\Http\Controllers;
use App\Models\Content;

class FlightController extends Controller
{
    public function index()
    {
        $contents = Content::with(["images", "user", "comments"])
            ->whereIn("type", ["flight"])
            ->where("status", 1)
            ->latest()
            ->simplePaginate(12)
            ->withQueryString();
        return inertia("FlightIndex", [
            "contents" => $contents,
        ])->withViewData([
            "title" => __("Flight offers"),
        ]);
    }

    public function show($index)
    {
        $content = Content::with([
            "user",
            "comments",
            "comments.user",
            "images",
        ])->findOrFail($index);

        return inertia("FlightShow", [
            "content" => $content,
        ])->withViewData([
            "title" => $content->title,
        ]);
    }
}
