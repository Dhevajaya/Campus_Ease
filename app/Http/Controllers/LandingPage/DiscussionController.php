<?php

namespace App\Http\Controllers\LandingPage;
use App\Http\Controllers\Controller;
use App\Models\Discussion;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    
    public function __construct(){
        $this->route = "landing-page.discussions.";
        $this->view = "landing-page.pages.discussions.";
        $this->discussion = new Discussion();
    }
    public function index()
    {
        $discussions = Discussion::with('user')->latest()->paginate(10);
        return view('landing-page.pages.discussions.index', compact('discussions'));
    }

    public function create()
    {
        return view('landing-page.pages.discussions.create');
    }
    public function show($id)
    {
        $discussion = Discussion::with('comments.user')->findOrFail($id);
        return view('landing-page.pages.discussions.show', compact('discussion'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        $discussion = new Discussion();
        $discussion->title = $validated['title'];
        $discussion->body = $validated['body'];
        $discussion->user_id = auth()->id();
        $discussion->save();

        return redirect()->route('landing-page.discussions.index')->with('success', 'Discussion created successfully!');
    }
}
