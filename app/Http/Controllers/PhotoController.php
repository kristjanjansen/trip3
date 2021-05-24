<?php

namespace App\Http\Controllers;
use App\Models\Content;

class PhotoController extends Controller
{
    public function index()
    {
        $contents = Content::with(["images", "user", "comments"])
            ->whereIn("type", ["photo"])
            ->where("status", 1)
            ->latest()
            ->simplePaginate(20)
            ->withQueryString();
        //return response()->json($contents);
        return inertia("PhotoIndex", [
            "contents" => $contents,
        ])->withViewData([
            "title" => __("Photos"),
        ]);
    }
}
