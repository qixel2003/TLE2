<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Photo;
class CommentController extends Controller
{
    public function store(Request $request, Photo $photo)
    {
        $request->validate([
            'comment' => 'required'
        ]);

        Comment::create([
            'comment' => $request->comment,
            'user_id' => auth()->id(),
            'photo_id' => $photo->id
        ]);

        return back();
    }
}
