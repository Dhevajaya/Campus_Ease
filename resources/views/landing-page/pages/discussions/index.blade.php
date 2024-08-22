@extends('landing-page.layouts.main')

@section('title', 'Diskusi')

@section('css')
@endsection

@section('preloader')
    @component('landing-page.components.preloader')
    @endcomponent
@endsection

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

 
<br>

@section('content')
    <h1>Discussions</h1>
    <a href="{{ route('landing-page.discussions.create') }}">Create New Discussion</a>
    <ul>
        @foreach ($discussions as $discussion)
            <li>
                <a href="{{ route('landing-page.discussions.show', $discussion) }}">{{ $discussion->title }}</a>
                <p>Posted by {{ $discussion->user->name }}</p>
            </li>
        @endforeach
    </ul>
@endsection



@section('scrolltop')
    @component('landing-page.components.scrolltop')
    @endcomponent
@endsection

@section('script')
@endsection
