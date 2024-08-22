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
        $request->validate([
            'body' => 'required',
        ]);

        Comment::create([
            'body' => $request->body,
            'discussion_id' => $discussion->id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('landing-page.discussions.show', $discussion);
    }
}
