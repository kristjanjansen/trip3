<?php

namespace App\Http\Controllers;
use App\Models\Content;
use GuzzleHttp\Psr7\Request;

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
        $q = request()->get("q");

        $contents = Content::with(["user", "comments"])
            ->where("type", $type)
            ->when($q, function ($query, $q) {
                return $query
                    ->where("title", "LIKE", "%" . $q . "%")
                    ->orWhere("body", "LIKE", "%" . $q . "%");
            })
            ->where("status", 1)
            ->latest()
            ->simplePaginate(15)
            ->withQueryString();

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
