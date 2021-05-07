<?php

namespace App\Http\Controllers;

class CommentController extends Controller
{
    public function store()
    {
        request()->validate([
            "body" => ["required", "min:3"],
        ]);
        sleep(2);
        return redirect()->route("forum.index");
    }
}
