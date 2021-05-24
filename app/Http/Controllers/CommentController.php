<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\User;

class CommentController extends Controller
{
    public function store($id)
    {
        request()->validate([
            "body" => ["required"],
        ]);
        $comment = User::findOrFail(1)
            ->comments()
            ->create([
                "body" => request()->body,
                "content_id" => $id,
                "status" => 1,
            ]);
        return redirect()->route("forum.show", $id);
    }

    public function update($id, $comment_id)
    {
        request()->validate([
            "body" => ["required"],
        ]);
        $comment = Comment::findOrFail($comment_id)->update([
            "body" => request()->body,
        ]);
        return redirect()->route("forum.show", $id);
    }
}
