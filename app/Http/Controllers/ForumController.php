<?php

namespace App\Http\Controllers;

class ForumController extends Controller
{
    public function index()
    {
        return inertia("Index")->withViewData([
            "meta" => ["key" => "test-key", "value" => "test-value"],
        ]);
    }
}
