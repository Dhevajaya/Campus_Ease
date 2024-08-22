

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body">
                    <h2>{{ $discussion->title }}</h2>
                    <p class="text-muted">
                        {{ $discussion->created_at->diffForHumans() }} oleh {{ $discussion->user->name }}
                    </p>
                    <p>{{ $discussion->body }}</p>
                </div>
            </div>

            <h4>Komentar</h4>
            @foreach ($discussion->comments as $comment)
                <div class="card mb-3">
                    <div class="card-body">
                        <p>{{ $comment->body }}</p>
                        <p class="text-muted">Dikomentari oleh {{ $comment->user->name }} pada {{ $comment->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            @endforeach

            <h4>Tambahkan Komentar</h4>
            <form action="{{ route('landing-page.comments.store', $discussion->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <textarea name="body" class="form-control" rows="3" placeholder="Tambahkan komentar..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Kirim</button>
            </form>
        </div>

        <div class="col-md-4">
            <!-- Right Sidebar or Additional Information -->
        </div>
    </div>
</div>
@endsection
