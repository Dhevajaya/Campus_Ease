

@section('content')
    <h1>{{ $discussion->title }}</h1>
    <p>{{ $discussion->body }}</p>
    <p>Posted by {{ $discussion->user->name }}</p>

    <h2>Comments</h2>
    <ul>
        @foreach ($discussion->comments as $comment)
            <li>
                {{ $comment->body }}
                <p>Commented by {{ $comment->user->name }}</p>
            </li>
        @endforeach
    </ul>

    <h3>Add a Comment</h3>
    <form method="POST" action="{{ route('landing-page.comments.store', $discussion) }}">
        @csrf
        <div>
            <label for="body">Comment</label>
            <textarea name="body" id="body">{{ old('body') }}</textarea>
        </div>
        <button type="submit">Add Comment</button>
    </form>
@endsection
