@extends('landing-page.layouts.main')

@section('title', 'Diskusi')

@section('css')
@endsection

@section('preloader')
    @component('landing-page.components.preloader')
    @endcomponent
@endsection
@section('content')
<section class="hero-area">
    <div class="breadcrumbs-wrapper blue-dark-gradient">
        <div class="shape shape-one scene"><span data-depth="2"></span></div>
        <div class="shape shape-two scene"><span data-depth="3"></span></div>
        <div class="shape shape-three scene"><span data-depth="4"></span></div>
        <div class="shape shape-four scene"><span data-depth=".1"></span></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="page-title-text text-center">
                        <h1 class="title">Komentar</h1>
                        <ul class="breadcrumbs-link">
                            <li><a href="{{route('landing-page.home.index')}}">Beranda</a></li>
                            <li class="active">Komentar</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="contact-information-area pt-5 pb-70">
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
</section >

@endsection





@section('scrolltop')
    @component('landing-page.components.scrolltop')
    @endcomponent
@endsection

@section('script')
@endsection



