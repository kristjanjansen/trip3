<?php

namespace App\Http\Controllers;

class ForumController extends Controller
{
    public function index()
    {
        return inertia("ForumIndex", [
            "contents" => config("data.forums"),
        ])->withViewData([
            "meta" => ["key" => "test-key", "value" => "test-value"],
        ]);
    }

    public function show($index)
    {
        return inertia("ForumShow", [
            "content" => config("data.forums")[$index],
        ])->withViewData([
            "meta" => ["key" => "test-key", "value" => "test-value"],
        ]);
    }
}
