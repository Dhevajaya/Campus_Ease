@extends("landing-page.layouts.main")

@section("title","Diskusi")

@section("css")
@endsection

@section("preloader")
    @component("landing-page.components.preloader")
    @endcomponent
@endsection



@section('content')
    <h1>Create a New Discussion</h1>

    <form method="POST" action="{{ route('landing-page.discussions.store') }}">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}">
        </div>
        <div>
            <label for="body">Body</label>
            <textarea name="body" id="body">{{ old('body') }}</textarea>
        </div>
        <button type="submit">Create</button>
    </form>
@endsection



@section("scrolltop")
    @component("landing-page.components.scrolltop")
    @endcomponent
@endsection

@section("script")
@endsection

