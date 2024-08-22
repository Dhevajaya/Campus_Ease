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
        $discussions = Discussion::latest()->get();
        return view('landing-page.pages.discussions.index', compact('discussions'));
    }

    public function create()
    {
        return view('landing-page.pages.discussions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        Discussion::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('landing-page.discussions.index');
    }

    public function show(Discussion $discussion)
    {
        return view('landing-page.pages.discussions.show', compact('discussion'));
    }
}
