<?php

namespace App\Http\Controllers;

class CommentController extends Controller
{
    public function store()
    {
        request()->validate([
            "body" => ["required"],
        ]);
        sleep(2);
        return redirect()->route("forum.show", [2]);
    }
}
