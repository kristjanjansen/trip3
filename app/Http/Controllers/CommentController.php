<?php

namespace App\Http\Controllers;

class CommentController extends Controller
{
    public function store()
    {
        //dd(request()->all());
        request()->validate([
            "body" => ["required"],
        ]);
        return redirect()->route("forum.show", [2]);
    }
}
