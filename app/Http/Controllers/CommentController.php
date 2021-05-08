<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        Log::error(request()->all());
        $request->validate([
            "body" => "required|min:5",
        ]);
        return redirect()->back();
    }
}
