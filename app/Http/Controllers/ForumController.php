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

    public function show(int $index)
    {
        return inertia("ForumShow", [
            "contents" => config("data.forums")[$index],
        ])->withViewData([
            "meta" => ["key" => "test-key", "value" => "test-value"],
        ]);
    }
}
