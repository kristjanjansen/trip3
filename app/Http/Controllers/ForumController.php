<?php

namespace App\Http\Controllers;
use App\Models\Content;

class ForumController extends Controller
{
    public function indexGeneral()
    {
        return $this->index("forum");
    }

    public function indexBuysell()
    {
        return $this->index("buysell");
    }

    public function indexExpat()
    {
        return $this->index("expat");
    }

    public function indexMisc()
    {
        return $this->index("misc");
    }

    public function index($type)
    {
        $contents = Content::with(["user", "comments"])
            ->where("type", $type)
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
