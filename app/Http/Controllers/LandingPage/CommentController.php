<?php

namespace App\Http\Controllers\LandingPage;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Discussion;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    
    public function store(Request $request, Discussion $discussion)
    {
        $validated = $request->validate([
            'body' => 'required',
        ]);

        $comment = new Comment();
        $comment->body = $validated['body'];
        $comment->user_id = auth()->id();
        $comment->discussion_id = $discussion->id;
        $comment->save();

        return redirect()->route('landing-page.pages.discussions.show', $discussion->id)->with('success', 'Comment added successfully!');
    }
}
